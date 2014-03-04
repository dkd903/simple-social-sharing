<?php

	class qa_simple_social_sharing_module {

		function allow_template($template)
		{
			return ($template!='admin');
		}

		function option_default($option)
		{
			switch ($option) {
				case 'simple_social_sharing_text':
					return "Share on";
					break;			
				case 'simple_social_sharing_buttons_fb':
				case 'simple_social_sharing_buttons_gp':
				case 'simple_social_sharing_buttons_tw':
				case 'simple_social_sharing_buttons_status':
					return true;
					break;									
				case 'simple_social_sharing_buttons_li':		
				case 'simple_social_sharing_buttons_re':	
				case 'simple_social_sharing_buttons_em':
					return false;
					break;						
			}
		}

		function admin_form()
		{
			//require_once QA_INCLUDE_DIR.'qa-util-sort.php';
			
			$saved=false;
			
			if (qa_clicked('simple_social_sharing_save_button')) {

				$trimchars="=;\"\' \t\r\n"; // prevent common errors by copying and pasting from Javascript
				qa_opt('simple_social_sharing_text', trim(qa_post_text('simple_social_sharing_text_field'), $trimchars));
				qa_opt('simple_social_sharing_buttons_fb', (int)qa_post_text('simple_social_sharing_buttons_fb_field'));
				qa_opt('simple_social_sharing_buttons_gp', (int)qa_post_text('simple_social_sharing_buttons_gp_field'));			
				qa_opt('simple_social_sharing_buttons_tw', (int)qa_post_text('simple_social_sharing_buttons_tw_field'));
				qa_opt('simple_social_sharing_buttons_li', (int)qa_post_text('simple_social_sharing_buttons_li_field'));
				qa_opt('simple_social_sharing_buttons_re', (int)qa_post_text('simple_social_sharing_buttons_re_field'));
				qa_opt('simple_social_sharing_buttons_em', (int)qa_post_text('simple_social_sharing_buttons_em_field'));
				qa_opt('simple_social_sharing_buttons_status', (int)qa_post_text('simple_social_sharing_buttons_status_field'));
																
				$saved=true;
			}
			
			$form=array(
				'ok' => $saved ? 'Simple Social Sharing settings saved' : null,

				'fields' => array(
					array(
						'id' => 'simple_social_sharing_text',
						'label' => 'Enter Your Share Text:',
						'value' => qa_html(qa_opt('simple_social_sharing_text')),
						'tags' => 'name="simple_social_sharing_text_field"',
						'note' => '<br />Choose Sharing Buttons from below: ',
					),					
					array(
						'id' => 'simple_social_sharing_buttons_fb',					
						'label' => 'Facebook',
						'type' => 'checkbox',
						'value' => (int)qa_opt('simple_social_sharing_buttons_fb'),
						'tags' => 'name="simple_social_sharing_buttons_fb_field"',
					),
					array(
						'id' => 'simple_social_sharing_buttons_gp',					
						'label' => 'Google Plus',
						'type' => 'checkbox',
						'value' => (int)qa_opt('simple_social_sharing_buttons_gp'),
						'tags' => 'name="simple_social_sharing_buttons_gp_field"',
					),
					array(
						'id' => 'simple_social_sharing_buttons_tw',					
						'label' => 'Twitter <img src="" />',
						'type' => 'checkbox',
						'value' => (int)qa_opt('simple_social_sharing_buttons_tw'),
						'tags' => 'name="simple_social_sharing_buttons_tw_field"',
					),
					array(
						'id' => 'simple_social_sharing_buttons_li',					
						'label' => 'LinkedIn',
						'type' => 'checkbox',
						'value' => (int)qa_opt('simple_social_sharing_buttons_li'),
						'tags' => 'name="simple_social_sharing_buttons_li_field"',
					),
					array(
						'id' => 'simple_social_sharing_buttons_re',					
						'label' => 'Reddit',
						'type' => 'checkbox',
						'value' => (int)qa_opt('simple_social_sharing_buttons_re'),
						'tags' => 'name="simple_social_sharing_buttons_re_field"',
					),
					array(
						'id' => 'simple_social_sharing_buttons_em',					
						'label' => 'e-mail',
						'type' => 'checkbox',
						'value' => (int)qa_opt('simple_social_sharing_buttons_em'),
						'tags' => 'name="simple_social_sharing_buttons_em_field"',
						'note' => '<br />Sharing buttons show up by default below each question, but you might want to turn them off if you are using the Sharing widget',
					),		
					array(
						'id' => 'simple_social_sharing_buttons_status',					
						'label' => (int)qa_opt('simple_social_sharing_buttons_status')?'Currently Enabled <em>(Uncheck to disable)</em>':'Currently Disabled <em>(Check to enable)</em>',
						'type' => 'checkbox',
						'value' => (int)qa_opt('simple_social_sharing_buttons_status'),
						'tags' => 'name="simple_social_sharing_buttons_status_field"',
					),											
				),

				'buttons' => array(
					array(
						'label' => 'Save Changes',
						'tags' => 'name="simple_social_sharing_save_button"',
					),
				),
			);

			return $form;
		}

	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/