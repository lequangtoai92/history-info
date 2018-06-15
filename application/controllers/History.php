<?php

/**
 * @author: Anph - 07/12/2017
 * @module: Facilio super controller
 * 
 * @standard:
 *  > module: module name, controller file name, class name :uppercase first letter
 *  > class: split to 2|[3] block: public && [protected] && private
 *  > function
 *     - private function functionName -> return required!
 *     - public function function_name
 *     - [protected] function _functionName
 *  > variable:
 *     - local: variableName
 *     - field -> follow db style
 */
defined('BASEPATH') or exit('No direct script access allowed');

class History extends MX_Controller {

    /**
     * global session user
     */
    protected $_fuser = array();

    /**
     * fh200 position selected at tree by logined user
     */
    protected $_FH200S = 0;

    /**
     * fh200 positon of logined user
     */
    protected $_FH200L = 0;

    /**
     * pvLOGIN: alway use when call service
     */
    protected $_QV101 = '';

    /**
     * data tree work around Facilo
     */
    protected $_bigTree = array();

    /**
     * all right list
     */
    protected $_rightList = array();

    public function __construct() {
        parent::__construct();
        if (!$this->_checkLogin()) {
            redirect('/login');
            return;
        }
        //store F_USER -> global
        $this->_fuser = $this->session->userdata(F_USER);
        $this->_FH200L = $this->_fuser['PH200'];

        $ssFH200 = $this->session->userdata('_FH200S');
        $this->_FH200S = isset($ssFH200) ? $ssFH200 : $this->_FH200L;
        $this->_QV101 = $this->_fuser['QV101'];

        //check ss -> store BIG_TREE -> global
        $bigTree = $this->session->userdata(BIG_TREE);
        if (!isset($bigTree) || empty($bigTree)) {
            $lstH200 = $this->loadH200Tree();
            $this->session->set_userdata(BIG_TREE, $lstH200);
        }
        $this->_bigTree = $this->session->userdata(BIG_TREE);

        //check ss -> store RIGHT_LST -> global
//    $rightList = $this->session->userdata(RIGHT_LST);
//    if (!isset($rightList) || empty($rightList)) {
//      $lstQ175 = $this->loadQ175Right($this->_fuser['PN100']);
//      $this->session->set_userdata(RIGHT_LST, $lstQ175);
//    }
//    $this->_rightList = $this->session->userdata(RIGHT_LST);
    }

    /*     * **************************************************************** */
    /*     * **************************[PUBLIC]****************************** */
    /*     * **************************************************************** */

    public function index() {
        $lang = $this->session->userdata('lang');
        $this->lang->load('facilio', $lang);
//        $xx = $this->session->userdata(LST_Q175);
        //        echo '.......' . in_array(ADM_MPA_DEL, $xx);
        redirect('/b200PM');
    }

    /**
     * call when user click one tree point
     */
    public function update_tree_point() {
        $post = filter_input_array(INPUT_POST);
        if (isset($post)) {
            $this->session->set_userdata('_FH200S', $post['fh200']);
            echo json_encode(array('status' => 'success'));
        }
    }

    public function logout() {
        session_destroy();
        redirect('', 'refresh');
    }

    /**
     * @Input: QV115: vi|de|en
     */
    public function changeLanguage() {
        $post = filter_input_array(INPUT_POST);
        if (isset($post)) {
            $this->session->set_userdata('lang', $post['QV115']);
            $this->changeLanguageToDB($post['QV115']);
        }
    }

    /**
     * @predicated
     */
    /*     * **************************************************************** */
    /*     * **************************[PROTECTED]*************************** */
    /*     * **************************************************************** */

    /**
     * 
     * @param type $title
     * @param type $page
     * @param type $modules
     * @param type $data
     * 
     */
    protected function loadTemplateAnph($title, $page, $wrapperClass, $stylesheet = '', $script = array(), $data = array()) {
        $response['common_view'] = 'common_view';
        $response['title'] = $title;
        $response['wrapperClass'] = $wrapperClass;
        if (!empty($stylesheet))
            $response['stylesheet'] = $stylesheet;
        if (!empty($script))
            $response['script'] = $script;
        $response['page_view'] = $page;
        $response['bigTree'] = $this->_bigTree;
        $response['currentFH200'] = $this->_FH200S;
        $data['QV101'] = $this->_QV101;
        $response['data'] = $data;
        $this->load->view('common_view', $response);
    }

    protected function loadTemplate($title, $page, $modules = array(), $data = array(), $wrapperClass = '') {
        $response['common_view'] = 'common_view';
        $response['title'] = $title;
        $response['wrapperClass'] = $wrapperClass;
        if (!empty($modules))
            $response['script'] = $modules;
        $response['page_view'] = $page;
        $response['bigTree'] = $this->_bigTree;
        $response['currentFH200'] = $this->_FH200S;
        $data['QV101'] = $this->_QV101;
        $response['data'] = $data;
        $this->load->view('common_view', $response);
    }

    /**
     * 
     * @param type $title
     * @param type $page
     * @param type $activeMenu
     * @param type $data
     */
    protected function loadAdminTemplate($title, $page, $activeMenu = '', $data = array()) {
        $response['common_view'] = 'common_view';
        $response['title'] = $title;
        if ($activeMenu != '')
            $response['active_menu'] = $activeMenu;
        $response['page_view'] = $page;
        $response['bigTree'] = $this->_bigTree;
        $response['currentFH200'] = $this->_FH200S;
        $data['QV101'] = $this->_QV101;
        $response['data'] = $data;
        $this->load->view('admin_view', $response);
    }

    /**
     * @Input: void
     * @Output: boolean
     * @Description: call at any module required login, check login state from session -> true | false
     */
    protected function _checkLogin() {
        $ss = $this->session->userdata(F_USER);
        return isset($ss) && !empty($ss);
    }

    /*     * **************************************************************** */
    /*     * *****************************[PRIVATE]************************** */
    /*     * **************************************************************** */

    /**
     * 
     * @return type
     */
    private function loadH200Tree() {
        $this->load->model('H200_model', 'H200_MODEL');
        return $this->H200_MODEL->list_oftabh200ma(APP_MODULE, $this->_FH200L, $this->_QV101);
    }

    /**
     * 
     * @param type $fn100
     * @return type
     */
    private function loadQ175Right($fn100 = 0) {
        $this->load->model('Q175_model', 'Q175_MODEL');
        return $this->Q175_MODEL->lst_oftabq175(APP_MODULE, 0, 0, $fn100);
    }

    /**
     * @Input: BV003
     * @Output: boolean
     * @Diescription: update language to db
     */
    private function changeLanguageToDB($lang) {
        $pvSCHEMA = '';
        $pvTABNAME = 'q100';
        $pvCOLNAME = 'QV104';
        $pvVALUE = $lang;
        $pvPRIMARYKEY = 'PQ100';
        $pnCONDITION = $_SESSION[SS_LGIN]['PQ100'];
        $pvLOGIN = $_SESSION[SS_LGIN]['NV106'];
        return $this->ORG_MODEL->o_update1colvoftab($pvSCHEMA, $pvTABNAME, $pvCOLNAME, $pvVALUE, $pvPRIMARYKEY, $pnCONDITION, $pvLOGIN);
    }

    

}
