<?php get_header(); ?>
<section class="posts-home text-center">
    <div class="main-container">  

        <?php query_posts('post_type=post&post_status=publish&posts_per_page=20&paged='. get_query_var('paged')); ?>

	<?php if( have_posts() ): 
		$grid = 1;
		$model = 1;
		$order = 1;
		$order2 = 1;
	?>
	        <?php while( have_posts() ): the_post();
        	$image = get_field('image');
        ?>
        <?php if(($grid-1)%3==0 || $grid==1){ ?><section class="blog-posts"> <?php } ?>
        <?php if($model==1): ?>        
        	<?php if($order==1): ?>
	        	<section class="blog-post-big">
					<div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
					  <div class="card">
					    <div class="card-image">
					      <img src="<?php echo $image['url']; ?>" alt="">
					    </div>
					    <div class="card-header">
					      <?phP the_Title(); ?>
					    </div>
					    <div class="card-copy">
					      <p><?php the_content(); ?></p> <SPAN><?PHP The_time('F j, Y'); ?> | <?PHP THE_AUTHOR_POSTS_LINK(); ?></SPAN>
					    </div>
					  </div>
					</div>
				</section>
        	<?php elseif($order>1): ?>        	
        		<?php if($order2==1): ?>
				<section class="blog-post-small">
				<div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
				  <div class="card">
				    <div class="card-image">
				      <img src="<?php echo $image['url']; ?>" alt="">
				    </div>
				    <div class="card-header">
				      <?phP the_Title(); ?>
				    </div>
				    <div class="card-copy">
				      <p><?php the_content(); ?></p> <SPAN><?PHP The_time('F j, Y'); ?> | <?PHP THE_AUTHOR_POSTS_LINK(); ?></SPAN>
				    </div>
				  </div>
				</div>			
				<?php elseif($order2==2): ?>
					<div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
					  <div class="card">
					    <div class="card-image">
					      <img src="<?php echo $image['url']; ?>" alt="">
					    </div>
					    <div class="card-header">
					      <?phP the_Title(); ?>
					    </div>
					    <div class="card-copy">
					      <p><?php the_content(); ?></p> <SPAN><?PHP The_time('F j, Y'); ?> | <?PHP THE_AUTHOR_POSTS_LINK(); ?></SPAN>
					    </div>
					  </div>
					</div>				
				</section>
				<?php endif; $order2=2; ?>
        	<?php endif; $order=2;?>
    	<?php endif; if($model==2): $order=1;$order2=1; ?>
    		<section class="blog-post-small">
				<div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
				  <div class="card">
				    <div class="card-image">
					      <img src="<?php echo $image['url']; ?>" alt="">
				    </div>
				    <div class="card-header">
					      <?phP the_Title(); ?>
				    </div>
				    <div class="card-copy">
				      <p><?php the_content(); ?></p> <SPAN><?PHP The_time('F j, Y'); ?> | <?PHP THE_AUTHOR_POSTS_LINK(); ?></SPAN>
				    </div>
				  </div>
				</div>
			</section>
    	<?php endif; if($model==3): ?>
    		<?php if($order==1): ?>
				<?php if($order2==1): ?>
					<section class="blog-post-small">
					<div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
					  <div class="card">
					    <div class="card-image">
					      <img src="<?php echo $image['url']; ?>" alt="">
					    </div>
					    <div class="card-header">
					      <?phP the_Title(); ?>
					    </div>
					    <div class="card-copy">
					      <p><?php the_content(); ?></p> <SPAN><?PHP The_time('F j, Y'); ?> | <?PHP THE_AUTHOR_POSTS_LINK(); ?></SPAN>
					    </div>
					  </div>
					</div>			
				<?php elseif($order2==2): ?>
						<div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
						  <div class="card">
						    <div class="card-image">
						      <img src="<?php echo $image['url']; ?>" alt="">
						    </div>
						    <div class="card-header">
						      <?phP the_Title(); ?>
						    </div>
						    <div class="card-copy">
						      <p><?php the_content(); ?></p> <SPAN><?PHP The_time('F j, Y'); ?> | <?PHP THE_AUTHOR_POSTS_LINK(); ?></SPAN>
						    </div>
						  </div>
						</div>				
					</section>
				<?php $order=2; endif; $order2=2; ?>    		
			<?php elseif($order>1): ?>        	
				<section class="blog-post-big">
					<div class="cards" onclick="window.location='<?php the_permalink(); ?>'">
					  <div class="card">
					    <div class="card-image">
					      <img src="<?php echo $image['url']; ?>" alt="">
					    </div>
					    <div class="card-header">
					      <?phP the_Title(); ?>					      
					    </div>
					    <div class="card-copy">
					      <p><?php the_content(); ?></p> <SPAN><?PHP The_time('F j, Y'); ?> | <?PHP THE_AUTHOR_POSTS_LINK(); ?></SPAN>
					    </div>
					  </div>
					</div>
				</section>
			<?php endif; ?>
    	<?php endif; ?>
    	<?php if($grid%3==0){ ?> </section>  <?php if($model==3){$model=1; $order2=1;$order=1;}else{$model++;} } $grid++; ?>        		            
        <?php endwhile; ?>        

		<div class="navigation">
			<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
		</div><!-- /.navigation -->

	<?php else: ?>

		<div id="post-404" class="noposts">

		    <p><?php _e('None found.','example'); ?></p>

	    </div><!-- /#post-404 -->

	<?php endif; wp_reset_query(); ?>

	</div><!-- /#content -->
</section>
<?php get_footer(); ?>