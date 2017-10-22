<?php


class child_theme_admin_form
{
    
    function load_module($directory, $urltoroot) {
		$this->directory=$directory;
		$this->urltoroot=$urltoroot;
	}
    function allow_template($template) {
		return ($template!='admin');
	}
    
    public function option_default($option){
		if ($option === 'child_theme_css')
			return file_get_contents($this->directory.'child-theme.css');
	}

	public function admin_form(&$qa_content)
	{
		$saved = qa_clicked('child_theme_save_button');
		if ($saved) {
			qa_opt('child_theme_on', (int) qa_post_text('child_theme_on_field'));
			$data = qa_post_text('child_theme_css');
                        qa_opt('child_theme_css',$data);
			file_put_contents($this->directory.'child-theme.css', $data);
		}


		return array(
			'ok' => $saved ? 'child theme settings saved' : null,

			'fields' => array(
				array(
					'label' => 'use child theme plugin to change the css',
					'type' => 'checkbox',
					'value' => qa_opt('child_theme_on'),
					'tags' => 'name="child_theme_on_field" id="child_theme_on_field"',
				),
                array(
				    'label' => 'child theme css stylesheet',
				    'tags' => 'NAME="child_theme_css" placeholder="your modifications here... "',
				    'value' => qa_opt('child_theme_css'),
			    	'rows' => 20,
				    'type' => 'textarea',
				),
		    ),
		    
			

			'buttons' => array(
				array(
					'label' => 'save changes',
					'tags' => 'name="child_theme_save_button"',
				),
			),
		);
	}
}
