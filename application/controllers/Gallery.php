<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application {


	public function index()
	{//loads gallery page
		//$this->load->view('gallery');
            $pix = $this->images->all();
            
            //build an array of formatted cells for them
            foreach ($pix as $picture) {
            $cells[] = $this->parser->parser('_cell', (array) $picture, true);
        }

        //prime the table class
            $this->load->library('table');
            $parms = array(
                    'table_open' => '<table class="gallery">',
                    'cell_start' => '<td class="oneimage">',
                    'cell_alt_start' => '<td class="oneimage">'
                );
            $this->table->set_template($parms);
            
            //finally! generate the table
            $rows = $this->table->make_column($cells, 3);
            $this->data['thetable'] = $this->table->generate($rows);
            
            $this->data['pagebody'] = 'gallery';
            $this->render();
	}
}

