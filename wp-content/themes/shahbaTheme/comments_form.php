<?php global $shahbaConfig; ?>
<?php
    $comment_web='';
    if($shahbaConfig['comment_web_input']){
        $comment_web='
                <p>
                    <input name="url" id="url" type="text" class="form-control" size="22" placeholder="'. esc_attr__('Your Website') .'" />
                </p>
            ';
    }
    comment_form(array(

        'title_reply' => '<div class="section_title"><h1>'.__('Leave A Reply', TEMPLATE_DMN).'</h1></div>',
        'title_reply_to' => '<div class="section_title"><h1>'.__('Reply To %s', TEMPLATE_DMN).'</h1></div>',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'comment_field' => '
            <p>
                <textarea name="comment" class="form-control" id="comment" rows="8" aria-required="true" placeholder="'. esc_attr__('Your Comment', TEMPLATE_DMN) .'"></textarea>
            </p>',

        'id_submit' => 'comment-submit',
        'label_submit' => __('Post Comment', TEMPLATE_DMN),

        'cancel_reply_link' => __('Cancel Reply', TEMPLATE_DMN),

        'fields' => array(
            'author' => '
                <p>
                    <input name="author" id="author" class="form-control" type="text" size="22" aria-required="true" placeholder="'. esc_attr__('Your Name') .'" />
                </p>',

            'email' => '
                <p>
                    <input name="email" id="email" type="text" class="form-control" size="22" aria-required="true" placeholder="'. esc_attr__('Your Email') .'" />
                </p>
            ',
            
            'url' => $comment_web
        ),
    ));