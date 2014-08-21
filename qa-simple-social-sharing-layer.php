<?php

class qa_html_theme_layer extends qa_html_theme_base
{

	function head_css() 
	{
		qa_html_theme_base::head_css();			
		$style_open = '<style type="text/css">.qa-sss-buttons {height: 16px; margin-top: 25px;}';
		$style_common = '.qa-sss-buttons .qa-sss-final .qa-sss-fb, .qa-sss-buttons .qa-sss-final .qa-sss-tw, .qa-sss-buttons .qa-sss-final .qa-sss-gp, .qa-sss-buttons .qa-sss-final .qa-sss-li, .qa-sss-buttons .qa-sss-final  .qa-sss-re, .qa-sss-buttons .qa-sss-final  .qa-sss-em {background-image: url('.qa_opt('site_url').'qa-plugin/simple-social-sharing/images/ma_share_buttons_full_em.png); background-repeat: no-repeat; overflow: hidden; background-color: transparent; width: 16px; height: 16px; display: inline-block; text-indent: -999em; outline: none;} .qa-sss-buttons .qa-sss-final {float: left;} .qa-sss-widget { margin-top: 0 !important; height: auto !important; } .qa-sss-widfinal a{ margin-right: 3px; }';
		$style_gp = qa_opt('simple_social_sharing_buttons_gp')?' .qa-sss-buttons .qa-sss-final .qa-sss-gp {background-position: -18px 0;}':'';		
		$style_fb = qa_opt('simple_social_sharing_buttons_fb')?' .qa-sss-buttons .qa-sss-final .qa-sss-fb {background-position: 0 0;}':'';
		$style_tw = qa_opt('simple_social_sharing_buttons_tw')?' .qa-sss-buttons .qa-sss-final .qa-sss-tw {background-position: -36px 0;}':'';
		$style_li = qa_opt('simple_social_sharing_buttons_li')?' .qa-sss-buttons .qa-sss-final .qa-sss-li {background-position: -54px 0;}':'';
		$style_re = qa_opt('simple_social_sharing_buttons_re')?' .qa-sss-buttons .qa-sss-final .qa-sss-re {background-position: -72px 0;}':'';
		$style_em = qa_opt('simple_social_sharing_buttons_em')?' .qa-sss-buttons .qa-sss-final .qa-sss-em {background-position: -88px 0;}':'';
		$style_total = $style_gp . $style_fb . $style_tw . $style_li . $style_re . $style_em;
		$style_close = '.qa-sss-clear {clear: both;} .qa-sss-buttons .qa-sss-text {color: #555; font-size: 13px; float: left; margin-right: 5px;}</style>';
		$style_final = $style_open . $style_common . $style_total . $style_close;
		$this->output($style_final);
	}

	function q_view_buttons($q_view)
	{
		//Social Media Buttons for question
		if ((int)qa_opt('simple_social_sharing_buttons_status')) {
			$page_url = urlencode(qa_opt('site_url').$this->request);
			$page_title = urlencode($q_view['raw']['title']);
			$this->output(
				'<div class="qa-sss-buttons">',
					'<div class="qa-sss-text">'.qa_opt('simple_social_sharing_text').' </div>',
					'<div class="qa-sss-final">',
						qa_opt('simple_social_sharing_buttons_gp')?'<a href="https://plus.google.com/share?url='.$page_url.'" target="_blank" rel="external nofollow" class="qa-sss-gp" title="share this question on Google+">share on gp</a>':'',
						qa_opt('simple_social_sharing_buttons_fb')?'<a href="https://www.facebook.com/sharer/sharer.php?u='.$page_url.'&amp;ref=fbshare&amp;t='.$page_title.'" target="_blank" rel="external nofollow" class="qa-sss-fb" title="share this question on Facebook">share on fb</a>':'',
						qa_opt('simple_social_sharing_buttons_tw')?'<a href="https://twitter.com/intent/tweet?original_referer='.$page_url.'&amp;text='.$page_title.'&amp;url='.$page_url.'" rel="external nofollow" target="_blank" class="qa-sss-tw" title="share this question on Twitter">share on tw</a>':'',
						qa_opt('simple_social_sharing_buttons_li')?'<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$page_url.'&amp;title='.$page_title.'&amp;summary='.$page_title.'" rel="external nofollow" target="_blank" class="qa-sss-li" title="share this question on Linkedin">share on li</a>':'',
						qa_opt('simple_social_sharing_buttons_re')?'<a href="http://www.reddit.com/submit?url='.$page_url.'&amp;title='.$page_title.'" rel="external nofollow" target="_blank" class="qa-sss-re" title="share this question on Reddit">share on re</a>':'',
						qa_opt('simple_social_sharing_buttons_em')?'<a href="mailto:?subject='.str_replace("+"," ",$page_title).'&amp;body=Check this out: '.str_replace("+"," ",$page_title).' - '.$page_url.'" rel="external nofollow" target="_blank" class="qa-sss-em" title="share this question via e-mail">share via email</a>':'',
					'</div>',
					'<div class="qa-sss-clear"></div>',
				'</div>'
			);			
		}
		qa_html_theme_base::q_view_buttons($q_view);
	}

}
