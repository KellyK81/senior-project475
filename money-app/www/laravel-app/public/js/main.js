(function($) {
    "use strict"; // Start of use strict
  
    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
      $("body").toggleClass("sidebar-toggled");
      $(".sidebar").toggleClass("toggled");
      if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
      };
    });
  
    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function() {
      if ($(window).width() < 768) {
        $('.sidebar .collapse').collapse('hide');
      };
      
      // Toggle the side navigation when window is resized below 480px
      if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
        $("body").addClass("sidebar-toggled");
        $(".sidebar").addClass("toggled");
        $('.sidebar .collapse').collapse('hide');
      };
    });
  
    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
      if ($(window).width() > 768) {
        var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
      }
    });
  
    // Scroll to top button appear
    // $(document).on('scroll', function() {
    //   var scrollDistance = $(this).scrollTop();
    //   if (scrollDistance > 100) {
    //     $('.scroll-to-top').fadeIn();
    //   } else {
    //     $('.scroll-to-top').fadeOut();
    //   }
    // });
  
    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(e) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: ($($anchor.attr('href')).offset().top)
      }, 1000, 'easeInOutExpo');
      e.preventDefault();
    });
    
    // if ($('.multiselect-dropdown')) {
    //   $('.multiselect-dropdown').multiselect();
    // }

    $('#btnSaveAndAddMore').click(function() {
        $('#addmore').val("1");
    });    

    function showTechStockQuotes() {
      if ($('#user_id').length < 1) return;
      $('.tech-stocks .spinner-border').show();
      $.get('/api/get_stock_quotes', function(data, status) {
          if (status === "success") {
              console.log('Got Stock Quotes');
              let tech_stocks = $('.tech-stocks .list-unstyled');
              tech_stocks.empty(); //Clear previous quotes
              for (const property in data) {
                  // `${property}: ${object[property]}`
                  if (typeof data[property].c !== undefined) {
                    tech_stocks.append(`<div class="row"><span class="col-sm"><strong>${property}:</strong></span> <span class="col-sm">$${data[property].c}</span></div>`);
                  }
              }
              $('.tech-stocks .spinner-border').hide();
          }
      });
    }


    function showJobs() {
      $('#job_data .spinner-border').show();
      
      if ($('#user_id').length < 1) return;

      let user_id = $('#user_id').val();
      $.get('/api/get_jobs/'+user_id, function(data, status) {
          let ul_jobs = $('#job_data > ul');
          ul_jobs.empty(); //Clear previous quotes
          if (status === "success") {
              console.log('Got Jobs');
              if (data.jobs !== undefined) {
                for (const index in data.jobs) {
                  ul_jobs.append(`<li>
                    <dl>
                      <dt>${data.jobs[index].title}, ${data.jobs[index].location} at <span class="text-primary">${data.jobs[index].company_name}</span></dt>
                      <dd>${data.jobs[index].description}</dd>
                      <dd><a href="${data.jobs[index].detail_url}" target="_blank">Apply Here</a></dd>
                    </dl>
                  </li>`);
                }
              }
          } else {
            ul_jobs.append('<li>No Jobs found! Please check the job title and skills you entered for job search to appear.</li>');          
          }
          $('#job_data .spinner-border').hide();
      });
    }

    function showJobsByTerms() {
      $('#job_search_data .spinner-border').show();
      if ($('#search_terms').length < 1) {
        return;
      }

      let search_terms = $('#search_terms').val();

      $.get('/api/get_jobs_by_terms/'+search_terms, function(data, status) {
          let ul_jobs = $('#job_search_data > ul');
          ul_jobs.empty(); //Clear previous quotes
          if (status === "success") {
              console.log('Got Jobs');
              if (data.jobs !== undefined) {
                for (const index in data.jobs) {
                  ul_jobs.append(`<li>
                    <dl>
                      <dt>${data.jobs[index].title}, ${data.jobs[index].location} at <span class="text-primary">${data.jobs[index].company_name}</span></dt>
                      <dd>${data.jobs[index].description}</dd>
                      <dd><a href="${data.jobs[index].detail_url}" target="_blank">Apply Here</a></dd>
                    </dl>
                  </li>`);
                }
              }
          } else {
            ul_jobs.append('<li>No Jobs found for your search term.</li>');          
          }
          $('#job_search_data .spinner-border').hide();
      });
    }
    
    showJobs();

    
    showJobsByTerms();

    // Dynamically get the stock updates every 30 seconds
    setInterval(showTechStockQuotes, 30000);

  })(jQuery); // End of use strict
