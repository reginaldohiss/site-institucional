<?php
class portfolioController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $portfolio = new Portfolio();
        $dados['portfolio'] = $portfolio->getTrabalhos();

        $this->loadTemplate('portfolio', $dados);
    }

}