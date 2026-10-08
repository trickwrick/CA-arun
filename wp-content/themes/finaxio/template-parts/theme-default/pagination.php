<div class="row mt-50">
    <div class="col-xl-12">
        <div class="theme__pagination">
            <?php
            the_posts_pagination(
                array(
                    'prev_text'          => '<i class="fas fa-chevron-left"></i>',
                    'next_text'          => '<i class="fas fa-chevron-right"></i>',
                    'screen_reader_text' => '',
                    'type'               => 'list'
                )
            );
            ?>
        </div>
    </div>
</div>