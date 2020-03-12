<?php
namespace BugApp\Controllers;

use BugApp\Models\bugManager;
use BugApp\Models\Bug;

class bugController{
    function add(){
        $bugManager = new BugManager();

        if (isset($_POST['submit']) ){

            $rep = $this->controlDom($_POST['add_NomDom']);

            if($rep['status'] == 'success'){
                $bug = new Bug(null,$_POST['add_Title'],$_POST['add_Desc'],0,null,$_POST['add_NomDom'],$rep['query']);
                var_dump($bug);
                $bugManager->add($bug);
                header('Location: list');
            } else {
                $content = $this->render('src/Views/addBug', [
                    'add_Title'     =>  $_POST['title'], 
                    'add_Desc'      =>  $_POST['Desc'], 
                    'add_NomDom'    =>  $_POST['NomDom'] 
                ]);
                return $this->sendHttpResponse($content, 200);
            }
        } else {
            $content = $this->render('src/Views/addBug', []);
            return $this->sendHttpResponse($content, 200);
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
            $content = $this->render("src/Views/list",["bugs" => $bugs]);
            return $this->sendHttpResponse($content, 200);
        }
    }
    
    function show($id){
        $bugManager = new BugManager();
        $bug = $bugManager->find($id);
        $content = $this->render('src/Views/show', ['bug' => $bug]);
        return $this->sendHttpResponse($content, 200);
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
    
    public function render($templatePath, $parametres){
        $templatePath = $templatePath . '.php';
        ob_start();
        $parametres;
        require($templatePath);
        return ob_get_clean();
    }
    
    public static function sendHttpResponse($content, $code = 200) {
        http_response_code($code);
        header('Content-Type: text/html');
        echo $content;
    }
}
