<?php
class Tools extends CI_Controller {

    public function message($to = 'World')
    {
        // echo "Hello {$to}!".PHP_EOL;
        
        // 缓存
        /*$this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
		if ( ! $foo = $this->cache->get('foo'))
		{
		    echo 'Saving to the cache!<br />';
		    $foo = 'foobarbaz!';

		    // Save into the cache for 5 minutes
		    $this->cache->save('foo', $foo, 300);
		}
		echo $foo;*/

		// 日历
		$prefs = array(
		    'start_day'    => 'monday',
		    'month_type'   => 'long',
		    'day_type'     => 'short',
		    'show_next_prev'  => TRUE,
		    'next_prev_url'   => 'http://localhost/ci/index.php/tools/message'
		);
		$prefs['template'] = array(
		    'table_open'           => '<table class="calendar" border="1" cellpadding="4" cellspacing="0" >',
		    'cal_cell_start'       => '<td class="day">',
		    'cal_cell_start_today' => '<td class="today">'
		);

		$this->load->library('calendar',$prefs);
		echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));

		p($this->config);
    }
}	
