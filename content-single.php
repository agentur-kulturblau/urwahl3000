
							<?php if ( has_post_thumbnail() ): ?>
							<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
								$url = $thumb['0']; ?>
								<a href="<?php echo $url ?>" class="postimg fancybox"><?php the_post_thumbnail('titelbild');  ?></a>
								<?php 
									$imgexc = get_post(get_post_thumbnail_id())->post_excerpt;
									if ($imgexc != "") {
										?><p class="caption"><span><i class="fa fa-picture-o"></i> <?php echo $imgexc;?></span></p><?php 
									}
									 ?>
							<?php endif; ?>

					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					    

						
						    <header class="article-header">							
							   	<?php 	$posttags = get_the_tags();
											 	if ($posttags) {
											 		?><p class="byline"><?php
											 		foreach($posttags as $tag) {
											 		echo '' .$tag->name. ' '; 
										  			}
										  		?></p><?php	
												} else {
													
													?> <p class="byline"><?php the_category(', '); ?></p><?php
												}
										?>		
							    <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
							     
						    </header>
					
						    
						    		<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>		
										 <section class="entry-content clearfix">
											<?php the_excerpt(); ?>
											<p><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="readmore">Weiterlesen »</a></p>
										</section> 
							
										<?php else : ?>
										
										<section class="entry-content clearfix">											
											<?php the_content(); ?>
											<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Seiten:', 'kr8' ), 'after' => '</div>' ) ); ?>
										</section>
										
										<?php endif; ?>
						    
						
						    <footer class="article-footer">
						    	<p class="byline">Veröffentlicht am <time class="updated" datetime="<?php echo the_time('c'); ?>"><?php the_time('j. F Y')?> um <?php the_time('H:i')?> Uhr.</time></p>
						    </footer> 
						   
						   <!-- Autor -->
							<?php if ( get_post_format() ) : ?>	
							<?php else: ?>
								<?php if ( get_the_author_meta( 'description' ) ) : ?>
								<div class="author cleafix">
										
										<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
										<div class="author-description">
											<h3><?php the_author_posts_link(); ?></h3>
											<p><?php the_author_meta( 'description' ); ?></p>
										</div>		
									</div>
								<?php endif; ?>
							<?php endif; ?>
						   
						   
						    </article> 
						    
						    <div class="sharewrap">
						    	<p class="calltoshare">
						    		<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink() ?>" class="twitter" title="Artikel twittern">Twitter</a>
						    		<a href="whatsapp://send?abid=256&text=Schau%20Dir%20das%20mal%20an%3A%20<?php the_permalink(); ?>" class="whatsapp" title="Per WhatsApp verschicken">WhatsApp</a>
									<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" class="facebook" title="Auf Facebook teilen">Facebook</a>
									<a href="https://plus.google.com/share?url=<?php the_permalink() ?>" class="google">Google+</a>
									<a href="mailto:?subject=Das musst Du lesen: <?php echo rawurlencode(get_the_title()); ?>&body=Hey, schau Dir das mal den Artikel auf <?php bloginfo('name'); ?> an: <?php the_permalink(); ?>" title="Per E-Mail weiterleiten" class="email">E-Mail</a>
						    	</p>
						    </div>
						    