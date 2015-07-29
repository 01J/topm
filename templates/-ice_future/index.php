<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// A code to show the offline.php page for the demo
if (JRequest::getCmd("tmpl", "index") == "offline") {
    if (is_file(dirname(__FILE__) . DS . "offline.php")) {
        require_once(dirname(__FILE__) . DS . "offline.php");
    } else {
        if (is_file(JPATH_SITE . DS . "templates" . DS . "system" . DS . "offline.php")) {
            require_once(JPATH_SITE . DS . "templates" . DS . "system" . DS . "offline.php");
        }
    }
} else {
	
// Include Variables
include_once(JPATH_ROOT . "/templates/" . $this->template . '/icetools/vars.php');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	
<?php  if ($this->params->get('responsive_template')) { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php } ?>
	
    <jdoc:include type="head" />
    

      <?php
	  
	     // Include CSS and JS variables 
	     include_once(JPATH_ROOT . "/templates/" . $this->template . '/icetools/css.php');
		 
        ?>

</head>

<body class="<?php echo $pageclass->get('pageclass_sfx'); ?>">


    <header id="header">
    
        <div class="container clearfix">
          
           <div id="logo">	
             <p><a href="<?php echo $this->baseurl ?>"><?php echo $logo; ?></a></p>
            </div>
        
         	
            <jdoc:include type="modules" name="mainmenu" />
              
              
            <?php if ($this->countModules('search')) { ?>
             <div id="search">
                <jdoc:include type="modules" name="search" />
            </div>
            <?php } ?>
            
            
       </div>   
          
    </header><!-- /#header -->
    
    
    
    <div id="main" class="container clearfix">
    
    	
        <jdoc:include type="modules" name="breadcrumbs" />
        
         <?php if ($this->countModules('icecarousel')) { ?>
         <div id="icecarousel">
            <jdoc:include type="modules" name="icecarousel" />
        </div>
        <?php } ?>
        
        
        <?php if ($this->countModules('promo1 + promo2 + promo3 + promo4')) { ?>
        <section id="promo" class="row">
        
            <div class="<?php echo $promospan;?>">	
                <jdoc:include type="modules" name="promo1" style="xhtml" />
            </div> 
            
            <div class="<?php echo $promospan;?>">	
                <jdoc:include type="modules" name="promo2" style="xhtml" />
            </div> 
            
            <div class="<?php echo $promospan;?>">	
                <jdoc:include type="modules" name="promo3" style="xhtml" />
            </div> 
            
            <div class="<?php echo $promospan;?>">	
                <jdoc:include type="modules" name="promo4" style="xhtml" />
            </div> 
           
        </section> 
        
        <hr />   
        <?php } ?>
         
            
        <div id="columns" class="row">
        
        	
            <?php if ($this->countModules('left')) { ?>
        	<div id="left-col" class="span3">
            
            	<jdoc:include type="modules" name="left" style="xhtml" />
            
            </div>
            <?php } ?>
           
            <div id="middle-col" class="<?php echo $colspan;?>">
        
                <section id="content">
                    
                  <jdoc:include type="message" />
				  <jdoc:include type="component" />
               
               
                </section><!-- /#content --> 
          
            </div>
            
            
            <?php if ($this->countModules('right')) { ?>
            <div id="right-col" class="span3">
            
                <jdoc:include type="modules" name="right" style="xhtml" />
            
            </div>	
            <?php } ?>
    
    
        </div>
    
    
    </div><!-- /#main --> 
    
    
    <?php if ($this->countModules('marketing')) { ?>
    <section id="marketing">
    	
        <div id="marketing_inside">
        
             <div class="container clearfix">
             
                 <jdoc:include type="modules" name="marketing" />
    
    		</div>
            
        </div>
        
    </section><!-- /#marking --> 
     <?php } ?>
    
    


    <footer id="footer">
    
        <div class="container clearfix">
        
        	<?php if ($this->countModules('footer1 + footer2 + footer3 + footer4')) { ?>
            <div id="footermods" class="row">
       
            	<div class="<?php echo $footerspan;?>">	
                	<jdoc:include type="modules" name="footer1" style="xhtml" />
                </div> 
                
                <div class="<?php echo $footerspan;?>">	
                	<jdoc:include type="modules" name="footer2" style="xhtml" />
                </div> 
                
                <div class="<?php echo $footerspan;?>">	
                	<jdoc:include type="modules" name="footer3" style="xhtml" />
                </div> 
                
                <div class="<?php echo $footerspan;?>">	
                	<jdoc:include type="modules" name="footer4" style="xhtml" />
                </div> 
                
            </div>
            
            <hr />   
            <?php } ?> 
             
         
            <div id="copyright_area">
            	
                <?php if($this->params->get('icelogo')) { ?>
                	<p id="icelogo"><a href="http://www.icetheme.com"><img src="templates/ice_future/images/icetheme.png" alt="IceTheme" ></a></p>
                <?php } ?> 
                
                <p id="copyright">&copy; <?php echo $sitename; ?> <?php echo date('Y');?> <a href="http://vjoomla.ru" target="_blank">������� Joomla</a></p>
                
                <?php if ($this->countModules('copyrightmenu')) { ?>
                <div id="copyrightmenu">
                    <jdoc:include type="modules" name="copyrightmenu" />
                </div>
                <?php } ?> 
                
                
                <?php if ($this->params->get('social_fb') or  $this->params->get('social_tw')) { ?>
                <div id="ice_social">
                	
                    <?php if($this->params->get('social_tw')) { ?>
                    <div id="social_tw">
                        <?php echo $social_tw; ?>
                    </div>
                     <?php } ?>  
                     
                     <?php if($this->params->get('social_fb')) { ?>
                    <div id="social_fb">
                        <?php echo $social_fb; ?>
                    </div> 
                    <?php } ?>   
                      
                    
                </div>
                <?php } ?> 
                
            
            </div>
            
        
        </div>
             
    </footer>
	
     <?php if ($this->params->get('go2top')) { ?>
		<a href="#" class="scrollup" style="display: inline; "><?php echo JText::_('TPL_TPL_FIELD_SCROLL'); ?></a>
	<?php } ?>
   
</body>
</html>
<?php } ?> 