<?php
use Dompdf\Dompdf;

defined('BASEPATH') or exit('No direct script access
allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf extends Dompdf
{
    protected function ci()
    {
        return get_instance();
    }
    public function load_view($view, $data = array())
    {
        $html = $this->ci()->load->view(
            $view,
            $data,
            TRUE
        );
        $this->loadHtml($html, null);
    }
}
