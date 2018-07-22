/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Header Search
5. Init Tabs
6. Init Accordions
7. Init Dropdowns


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var header = $('.header');
	var menuActive = false;
	var menu = $('.menu');
	var burger = $('.hamburger');

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	initMenu();
	// initHeaderSearch();
	initTabs();
	initAccordions();
	initDropdowns();

	$('.book_file').on('click', function()
	{
	    var file=$(this).attr('file');
	    
		$('#exampleBookCenterTitle').text("Books: "+file);
		
		var link="https://drive.google.com/viewerng/viewer?url="+removeSpace($(this).attr('link'))+"&hl=en&pid=explorer&efh=false&a=v&chrome=false&embedded=true";
		setFileLinktoViewer(link,'pdf_viewer');
		return true;
	});

	$('.video_file').on('click', function()
	{
		var file=$(this).attr('file');
		
		$('#exampleVideoCenterTitle').text("Video: "+file);
		var link=removeSpace($(this).attr('link'));
		
		
		setFileLinktoViewer(link,'vjs-tech');

		return true;
	});

	$('.ppt_file').on('click', function()
	{
	    var file=$(this).attr('file');
	    
		$('#examplePPTCenterTitle').text("PPT: "+file);
		var link="https://view.officeapps.live.com/op/embed.aspx?src="+removeSpace($(this).attr('link'));
		
		setFileLinktoViewer(link,'ppt_viewer');

		return true;
	});

	/* 

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 100)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/* 

	3. Init Menu

	*/

	function initMenu()
	{
		if($('.menu').length)
		{
			var menu = $('.menu');
			if($('.hamburger').length)
			{
				burger.on('click', function()
				{
					if(menuActive)
					{
						closeMenu();
					}
					else
					{
						openMenu();

						$(document).one('click', function cls(e)
						{
							if($(e.target).hasClass('menu_mm'))
							{
								$(document).one('click', cls);
							}
							else
							{
								closeMenu();
							}
						});
					}
				});
			}
		}
	}

	function openMenu()
	{
		menu.addClass('active');
		menuActive = true;
	}

	function closeMenu()
	{
		menu.removeClass('active');
		menuActive = false;
	}

	/* 

	4. Init Header Search

	*/

	function initHeaderSearch()
	{
		if($('.search_button').length)
		{
			$('.search_button').on('click', function()
			{
				if($('.header_search_container').length)
				{
					$('.header_search_container').toggleClass('active');
				}
			});
		}
	}

	/* 

	5. Init Tabs

	*/

	function initTabs()
	{
		if($('.tab').length)
		{
			$('.tab').on('click', function()
			{
				$('.tab').removeClass('active');
				$(this).addClass('active');
				var clickedIndex = $('.tab').index(this);

				var panels = $('.tab_panel');
				panels.removeClass('active');
				$(panels[clickedIndex]).addClass('active');
			});
		}
	}

	/* 

	6. Init Accordions

	*/

	function initAccordions()
	{
		if($('.accordion').length)
		{
			var accs = $('.accordion');

			accs.each(function()
			{
				var acc = $(this);

				if(acc.hasClass('active'))
				{
					var panel = $(acc.next());
					var panelH = panel.prop('scrollHeight') + "px";
					
					if(panel.css('max-height') == "0px")
					{
						panel.css('max-height', panel.prop('scrollHeight') + "px");
					}
					else
					{
						panel.css('max-height', "0px");
					} 
				}

				acc.on('click', function()
				{
					if(acc.hasClass('active'))
					{
						acc.removeClass('active');
						var panel = $(acc.next());
						var panelH = panel.prop('scrollHeight') + "px";
						
						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						} 
					}
					else
					{
						acc.addClass('active');
						var panel = $(acc.next());
						var panelH = panel.prop('scrollHeight') + "px";
						
						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						} 
					}
				});
			});
		}
	}

	/* 

	7. Init Dropdowns

	*/

	function initDropdowns()
	{
		if($('.dropdowns li').length)
		{
			var dropdowns = $('.dropdowns li');

			dropdowns.each(function()
			{
				var dropdown = $(this);
				if(dropdown.hasClass('has_children'))
				{
					if(dropdown.hasClass('active'))
					{
						var panel = $(dropdown.find('> ul'));
						var panelH = panel.prop('scrollHeight') + "px";

						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						}
					}

					dropdown.find(' > .dropdown_item').on('click', function()
					{
						var panel = $(dropdown.find('> ul'));
						var panelH = panel.prop('scrollHeight') + "px";
						dropdown.toggleClass('active');

						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						}
					});
				}
			});
		}
	}

	function setFileLinktoViewer($link,$class)
	{
		$('.'+$class).attr('src',$link);
	}
	
	function removeSpace($link){
	    $link=encodeURI($link);
	    return $link;
	}

});