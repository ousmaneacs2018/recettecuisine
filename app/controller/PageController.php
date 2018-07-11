<?php

class PageController extends Controller {
    public function index(){

            
            $afficher = Recette::Affiche();
            
            $afficherConseils = Recette::AfficheConseils();
    

        $limit = $this->route['params']["limit"];

        $template = $this->twig->loadTemplate('/Page/index.html.twig');
        echo $template->render(array(
            'afficher' => $afficher
        ));


    }
    
    public function searchAliment(){
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $Aliment = Recette::getSearchAliment($_POST['search']);

            $template =$this->twig->loadTemplate('/Page/index.html.twig');
            echo $template->render(array(
                'search'    => $_POST['search'],
                'Aliment'     => $Aliment
            ));
        } else {
            header('Location:/recette');
        }
    }

    public function ajaxSearchAliment(){
        $aliment = Recette::getSearchAliment($this->route['params']['search'], 10);
        $resultat = json_encode($aliment);
                
        echo $resultat;
    }
}