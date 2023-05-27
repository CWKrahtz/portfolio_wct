<?php
/**
 * Testimonial Template Style Ten
 *
 * @package Radiantthemes
 */
$c="";
$tem++;

if ($tem==1) { $c="active"; ?>

                                    <!-- Carousel Slides / Quotes -->
                                    <div class="carousel-inner text-center"> 
                                    <?php } ?>

                                        <!-- Quote 1 -->
                                        <div class="item <?php echo $c; ?>">
                                            <blockquote>
                                                <div class="row">
                                                    <div class="col-sm-10 col-sm-offset-1">
                                                       
                                                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. !</h6>
                                                        <div class="testimonial-title">
                                                            <h6 class="title">Barry Doe Taylor</h6>
                                                            <p class="designation">Web Developer</p>
                                                        </div><!--end of testimonial-title-->
                                                    </div>
                                                </div>
                                            </blockquote>
                                        </div>
                           
                                    <?php if ($tem==$count ) {     ?>    
                                    </div>

                                    

           <?php } ?>


   
        
