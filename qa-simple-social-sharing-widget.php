<?php

	class qa_simple_social_sharing_widget {	

		function allow_template($template)
		{
			return ($template=='question');
		}

		function allow_region($region)
		{
			return true;
		}
		
		function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
		{
			$page_url = urlencode(qa_opt('site_url').$request);
			$page_title = urlencode($qa_content["q_view"]["raw"]["title"]);
			echo
				'<div class="qa-sss-buttons qa-sss-widget">'.
					'<div class="qa-sss-text">'.qa_opt('simple_social_sharing_text').'</div>'.
					'<div class="qa-sss-final qa-sss-widfinal">'.
						(qa_opt('simple_social_sharing_buttons_gp')?'<a href="https://plus.google.com/share?url='.$page_url.'" target="_blank" rel="external nofollow" class="qa-sss-gp" title="share this question on Google+">share on gp</a>':'').
						(qa_opt('simple_social_sharing_buttons_fb')?'<a href="https://www.facebook.com/sharer/sharer.php?u='.$page_url.'&amp;ref=fbshare&amp;t='.$page_title.'" target="_blank" rel="external nofollow" class="qa-sss-fb" title="share this question on Facebook">share on fb</a>':'').
						(qa_opt('simple_social_sharing_buttons_tw')?'<a href="https://twitter.com/intent/tweet?original_referer='.$page_url.'&amp;text='.$page_title.'&amp;url='.$page_url.'" rel="external nofollow" target="_blank" class="qa-sss-tw" title="share this question on Twitter">share on tw</a>':'').
						(qa_opt('simple_social_sharing_buttons_li')?'<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$page_url.'&amp;title='.$page_title.'&amp;summary='.$page_title.'" rel="external nofollow" target="_blank" class="qa-sss-li" title="share this question on Linkedin">share on li</a>':'').
						(qa_opt('simple_social_sharing_buttons_re')?'<a href="http://www.reddit.com/submit?url='.$page_url.'&amp;title='.$page_title.'" rel="external nofollow" target="_blank" class="qa-sss-re" title="share this question on Reddit">share on re</a>':'').
						(qa_opt('simple_social_sharing_buttons_em')?'<a href="mailto: ?subject='.$page_title.'&amp;body=Check this out: '.$page_title.' - '.$page_url.'" rel="external nofollow" target="_blank" class="qa-sss-em" title="share this question via e-mail">share via email</a>':'').
					'</div>'.
					'<div class="qa-sss-clear"></div>'.
				'</div>';	
		}

	}