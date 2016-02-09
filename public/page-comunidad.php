<?php get_header(); ?>

<section class="posts-home text-center banner">
    <div class="main-container">
        <div class="search-tools">
            <div class="filters">
                <form action=".">
                    <div class="column-8-block filter">
                        <label class="column-2-block title">Etiquetas:</label>

                        <div class="column-10-block">
                            <ol class="filter-list">
                                <?php wp_list_categories(array('hierarchical' => 0, 'title_li' => '', 'walker' => new Walker_Simple_Example())); ?>
                            </ol>
                        </div>
                    </div>

                    <div class="column-4-block filter trigger">
                        <button type="submit">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>


        <?php
        if ($_GET['in_categories']) {
            query_posts(array('category__in' => $_GET['in_categories'], 'posts_per_page' => 20, 'paged' => get_query_var('paged'), 'post_status' => 'publish'));
        } else {
            query_posts('post_type=post&post_status=publish&posts_per_page=20&paged=' . get_query_var('paged'));
        }
        ?>


        <?php if (have_posts()):
            $grid = 1;
            $model = 1;
            $order = 1;
            $order2 = 1;
            ?>
            <?php while (have_posts()): the_post();
            $image = get_field('image');
            ?>
            <?php if (($grid - 1) % 3 == 0 || $grid == 1) { ?><section class="blog-posts"> <?php } ?>
            <?php if ($model == 1): ?>
                <?php if ($order == 1): ?>
                    <section class="blog-post-big">
                        <div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?php echo $image['url']; ?>" alt="">
                                </div>
                                <div class="card-header">
                                    <?php the_Title(); ?>
                                </div>
                                <div class="card-copy">
                                    <p><?php the_excerpt(); ?></p> <SPAN><?php The_time('F j, Y'); ?>
                                        | <?php THE_AUTHOR_POSTS_LINK(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php elseif ($order > 1): ?>
                    <?php if ($order2 == 1): ?>
                        <section class="blog-post-small">
                        <div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?php echo $image['url']; ?>" alt="">
                                </div>
                                <div class="card-header">
                                    <?php the_Title(); ?>
                                </div>
                                <div class="card-copy">
                                    <p><?php the_excerpt(); ?></p> <SPAN><?php The_time('F j, Y'); ?>
                                        | <?php THE_AUTHOR_POSTS_LINK(); ?></SPAN>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($order2 == 2): ?>
                        <div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?php echo $image['url']; ?>" alt="">
                                </div>
                                <div class="card-header">
                                    <?php the_Title(); ?>
                                </div>
                                <div class="card-copy">
                                    <p><?php the_excerpt(); ?></p> <SPAN><?php The_time('F j, Y'); ?>
                                        | <?php THE_AUTHOR_POSTS_LINK(); ?></SPAN>
                                </div>
                            </div>
                        </div>
                        </section>
                    <?php endif;
                    $order2 = 2; ?>
                <?php endif;
                $order = 2; ?>
            <?php endif;
            if ($model == 2): $order = 1;
                $order2 = 1; ?>
                <section class="blog-post-small">
                    <div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo $image['url']; ?>" alt="">
                            </div>
                            <div class="card-header">
                                <?php the_Title(); ?>
                            </div>
                            <div class="card-copy">
                                <p><?php the_excerpt(); ?></p> <SPAN><?php The_time('F j, Y'); ?>
                                    | <?php THE_AUTHOR_POSTS_LINK(); ?></SPAN>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif;
            if ($model == 3): ?>
                <?php if ($order == 1): ?>
                    <?php if ($order2 == 1): ?>
                        <section class="blog-post-small">
                        <div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?php echo $image['url']; ?>" alt="">
                                </div>
                                <div class="card-header">
                                    <?php the_Title(); ?>
                                </div>
                                <div class="card-copy">
                                    <p><?php the_excerpt(); ?></p> <SPAN><?php The_time('F j, Y'); ?>
                                        | <?php THE_AUTHOR_POSTS_LINK(); ?></SPAN>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($order2 == 2): ?>
                        <div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?php echo $image['url']; ?>" alt="">
                                </div>
                                <div class="card-header">
                                    <?php the_Title(); ?>
                                </div>
                                <div class="card-copy">
                                    <p><?php the_excerpt(); ?></p> <SPAN><?php The_time('F j, Y'); ?>
                                        | <?php THE_AUTHOR_POSTS_LINK(); ?></SPAN>
                                </div>
                            </div>
                        </div>
                        </section>
                        <?php $order = 2; endif;
                    $order2 = 2; ?>
                <?php elseif ($order > 1): ?>
                    <section class="blog-post-big">
                        <div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?php echo $image['url']; ?>" alt="">
                                </div>
                                <div class="card-header">
                                    <?php the_Title(); ?>
                                </div>
                                <div class="card-copy">
                                    <p><?php the_excerpt(); ?></p> <SPAN><?php The_time('F j, Y'); ?>
                                        | <?php THE_AUTHOR_POSTS_LINK(); ?></SPAN>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($grid % 3 == 0) { ?> </section>  <?php if ($model == 3) {
                $model = 1;
                $order2 = 1;
                $order = 1;
            } else {
                $model++;
            }
            }
            $grid++; ?>
        <?php endwhile; ?>

            <div class="navigation">
                <span class="newer"><?php previous_posts_link(__('« Newer', 'example')) ?></span> <span
                    class="older"><?php next_posts_link(__('Older »', 'example')) ?></span>
            </div><!-- /.navigation -->

        <?php else: ?>

            <div id="post-404" class="noposts">

                <p><?php _e('None found.', 'example'); ?></p>

            </div><!-- /#post-404 -->

        <?php endif;
        wp_reset_query(); ?>

    </div>
    <!-- /#content -->
</section>
<?php get_footer(); ?>
<script type="text/javascript">
    var Filter = (function () {
        function Filter(element) {
            this._element = $(element);
            this._optionsContainer = this._element.find(this.constructor.optionsContainerSelector);
        }

        Filter.selector = '.filter';
        Filter.optionsContainerSelector = '> div';
        Filter.hideOptionsClass = 'hide-options';

        Filter.enhance = function () {
            var klass = this;

            return $(klass.selector).each(function () {
                return new klass(this).enhance();
            });
        };

        Filter.prototype.enhance = function () {
            this._buildUI();
            this._bindEvents();
        };

        Filter.prototype._buildUI = function () {
            this._summaryElement = $('<label></label>').
                addClass('summary').
                attr('data-role', 'summary').
                prependTo(this._optionsContainer);

            this._clearSelectionButton = $('<button class=clear></button>').
                text('Limpiar').
                attr('type', 'button').
                insertAfter(this._summaryElement);

            this._optionsContainer.addClass(this.constructor.hideOptionsClass);
            this._updateSummary();
        };

        Filter.prototype._bindEvents = function () {
            var self = this;

            this._summaryElement.click(function () {
                self._toggleOptions();
            });

            this._clearSelectionButton.click(function () {
                self._clearSelection();
            });

            this._checkboxes().change(function () {
                self._updateSummary();
            });

            $('body').click(function (e) {
                var inFilter = $(e.target).closest(self.constructor.selector).length > 0;

                if (!inFilter) {
                    self._allOptionsContainers().addClass(self.constructor.hideOptionsClass);
                }
            });
        };

        Filter.prototype._toggleOptions = function () {
            this._allOptionsContainers().
                not(this._optionsContainer).
                addClass(this.constructor.hideOptionsClass);

            this._optionsContainer.toggleClass(this.constructor.hideOptionsClass);
        };

        Filter.prototype._updateSummary = function () {
            var summary = 'Todos';
            var checked = this._checkboxes().filter(':checked');

            if (checked.length > 0 && checked.length < this._checkboxes().length) {
                summary = this._labelsFor(checked).join(', ');
            }

            this._summaryElement.text(summary);
        };

        Filter.prototype._clearSelection = function () {
            this._checkboxes().each(function () {
                $(this).prop('checked', false);
            });

            this._updateSummary();
        };

        Filter.prototype._checkboxes = function () {
            return this._element.find(':checkbox');
        };

        Filter.prototype._labelsFor = function (inputs) {
            return inputs.map(function () {
                var id = $(this).attr('id');
                return $("label[for='" + id + "']").text();
            }).get();
        };

        Filter.prototype._allOptionsContainers = function () {
            return $(this.constructor.selector + " " + this.constructor.optionsContainerSelector);
        };

        return Filter;
    })();

    $(function () {
        Filter.enhance();
    });
</script>