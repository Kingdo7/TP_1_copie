<?php
namespace BugApp\Controllers;

use BugApp\Models\bugManager;
use BugApp\Models\Bug;

class bugController{
    function add(){
        $bugManager = new BugManager();
        $rep = $this->controlDom($_POST['add_NomDom']);

        if($rep['status'] == 'success'){
            $bug = new Bug(null,$_POST['add_Title'],$_POST['add_Desc'],0,null,$_POST['add_NomDom'],$rep['query']);
            var_dump($bug);
            $bugManager->add($bug);
            return $this->sendHttpResponse($bug, 201);
        } else {
           // TODO Si l'user n'a pas remplit le formulaire "URL"
        }
    }
    
    function controlDom($nom_dom){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/' . $nom_dom);
        echo $response->getBody();
        $body = json_decode($response->getBody());
        var_dump($body);
        if($body->status == 'success'){
            $rep = [
                'query'     => $body->query,
                'status'    => $body->status
            ];
        } else {
            $rep = [
                'status'    => $body->status
            ];
        }        
        return $rep;
    }

    function list(){
        $header = apache_request_headers();
        $bugManager = new BugManager();

        if (isset($header['XMLHttpRequest'])) { //"casse a vérifier" Sinon si le filtre est actif sinon  
            if (isset($_GET['filtre'])){
                $bugs = $bugManager->findByStatus();
               
            } else {
                $bugs = $bugManager->findAll();
            }
            $response = [
                'succes'    => true,
                'bugs'      => $bugs,
            ];
            echo json_encode($response);

        } else {
            $bugs = $bugManager->findAll();
            //var_dump($bugs);
            return $this->sendHttpResponse($bug, 201);
        }
    }
    
    function show($id){
        $bugManager = new BugManager();
        $bug = $bugManager->find($id);
        //$content = $this->render('src/Views/show', ['bug' => $bug]);
        return $this->sendHttpResponse($bug, 201);
    }

    function update($id){
        $bugManager = new BugManager();
        $bug = $bugManager->find($id);
        if (isset($_POST)) {
            if (isset($_POST['statut'])) {
                $bug->setStatut($_POST['statut']);
            }
            $bugManager->update($bug);
        
            http_response_code(200);
            header('Content-type: application/json');
            $response = [
                'succes'    => true,
                'id'        => $bug->getId()
            ];
        }
            //echo json_encode($response);
        if (isset($headers['XMLHttpRequest']) && $headers['XMLHttpRequest'] == true) {
            $content = $this->render('src/Views/edit', ['bug' => $bug]);            
        } 
        return $this->sendHttpResponse($content, 200);
    }
    
    public static function sendHttpResponse($content, $code = 200) {
        http_response_code($code);
        header('Content-Type: application/json');
        echo $content;
    }
}
