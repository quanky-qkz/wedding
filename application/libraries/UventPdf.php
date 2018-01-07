<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class UventPdf extends TCPDF
{
    /**
     * Overwrite Header() method.
     * @public
     */
    public function Header() {
        if ($this->tocpage) {
            // *** replace the following parent::Header() with your code for TOC page
            parent::Header();
        } else {
            // *** replace the following parent::Header() with your code for normal pages
            parent::Header();
        }
    }

    /**
     * Overwrite Footer() method.
     * @public
     */
    public function Footer() {
        if ($this->tocpage) {
            // *** replace the following parent::Footer() with your code for TOC page
            parent::Footer();
        } else {
            // *** replace the following parent::Footer() with your code for normal pages
            parent::Footer();
        }
    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */