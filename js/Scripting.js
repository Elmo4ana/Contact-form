/*jslint plusplus:true , evil:true , */
/*global $,document, console*/

$(function () {
    
    'use strict';
    
    var userErrors = true,
        
        emailErrors = true,
        
        msgErrors = true,
        
        phoneErrors = true;
    
    
    $('.username').blur(function () {
        
        if ($(this).val().length < 4 || !isNaN($(this).val())) {
            
            $(this).css('border', '1.4px solid #f00');
           
            $(this).parent().find('.cus').fadeIn(200);
            
            $(this).parent().find('.as').fadeIn(100);
            
            userErrors = true;
            
        } else {
            
            $(this).css('border', '1.4px solid #080');
            
            $(this).parent().find('.cus').fadeOut(200);
            
            $(this).parent().find('.as').fadeOut(100);
            
            userErrors = false;
        }
        
        
    });
    
    
    $('.email').blur(function () {
        
        if ($(this).val() === '') {
            
            $(this).css('border', '1.4px solid #f00');
           
            $(this).parent().find('.cus').fadeIn(200);
            
            $(this).parent().find('.as').fadeIn(100);
            
            emailErrors = true;
            
        } else {
            
            $(this).css('border', '1.4px solid #080');
            
            $(this).parent().find('.cus').fadeOut(200);
            
            $(this).parent().find('.as').fadeOut(100);
            
            emailErrors = false;
        }
        
        
    });
    
    $('.message').blur(function () {
        
        if ($(this).val().length < 10) {
            
            $(this).css('border', '1.4px solid #f00');
           
            $(this).parent().find('.cus').fadeIn(200);
            
            $(this).parent().find('.as').fadeIn(100);
            
            msgErrors = true;
            
        } else {
            
            $(this).css('border', '1.4px solid #080');
            
            $(this).parent().find('.cus').fadeOut(200);
            
            $(this).parent().find('.as').fadeOut(100);
            
            msgErrors = false;
        }
                
    });
    
    $('.phone').blur(function () {
        
        if (isNaN($(this).val()) || $(this).val() === '') {
            
            $(this).css('border', '1.4px solid #f00');
           
            $(this).parent().find('.cus').fadeIn(200);
            
            $(this).parent().find('.as').fadeIn(100);
            
            phoneErrors = true;
            
        } else {
            
            $(this).css('border', '1.4px solid #080');
            
            $(this).parent().find('.cus').fadeOut(200);
            
            $(this).parent().find('.as').fadeOut(100);
            
            phoneErrors = false;
        }
        
        
    });
    
    
    $('.con-form').submit(function (e) {
        
        if (userErrors === true || emailErrors === true || msgErrors === true || phoneErrors === true) {
        
            e.preventDefault();
            
            $('.username, .email, .message , .phone').blur();
            
        }
    });
    
});