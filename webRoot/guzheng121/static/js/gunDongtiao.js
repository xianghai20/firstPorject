
    function _diysrcoll () {
        // body...
        var oBox = document.getElementById('scroll-box');
        var oBar = document.getElementById('bar');
        var oWrap = document.getElementById('scroll-wrap');
        var oCon = document.getElementById('scroll-content');
        var barTop = oBox.clientHeight - oBar.offsetHeight;
        var contTop = oWrap.clientHeight - oCon.scrollHeight;
        var iTop = 0;


        oBar.onmousedown = function( ev ){

            //æ»šåŠ¨æ¡
            var ev = ev || event;
            var disY = ev.clientY - this.offsetTop;

            document.onmousemove = function( ev ){
                var ev = ev || event;
                iTop = ev.clientY - disY;

                fn1( iTop );

            };

            document.onmouseup = function(){
                document.onmousemove = document.onmouseup = null;
            };

            return false;
        };

        mouseScrollEvt( oBox , function(){
            iTop -= 15;  // æ»šåŠ¨é€Ÿåº¦
            fn1( iTop );

        }, function(){
            iTop += 15;
            fn1( iTop );
        } );

        mouseScrollEvt( oWrap , function(){
            iTop -= 15;
            fn1( iTop );

        }, function(){
            iTop += 15;
            fn1( iTop );
        });

        function fn1(){

            // æŽ§åˆ¶æœ€å¤§æ»šåŠ¨è·ç¦»
            if( iTop < 0 ) iTop = 0;
            if( iTop > oBox.clientHeight - oBar.offsetHeight )
                iTop = oBox.clientHeight - oBar.offsetHeight;

            oBar.style.top = iTop + 'px';
            oCon.style.top = iTop / barTop * contTop + 'px';
        }

        function mouseScrollEvt( obj , upFn, downFn ){

            // é¼ æ ‡æ»šåŠ¨äº‹ä»¶=
            obj.onmousewheel = mouseScroll;
            if( obj.addEventListener )
                obj.addEventListener('DOMMouseScroll',mouseScroll, false);

            function mouseScroll( ev ){
                var ev = ev || event;
                var bDown = true;  //true : å‘ä¸‹   false : å‘ä¸Š
                if( ev.detail ){
                    bDown =  ev.detail < 0 ? false : true;
                }else{
                    bDown = ev.wheelDelta < 0 ? true : false;
                }
                if( bDown ){
                    if( typeof downFn === 'function') downFn();
                }else{
                    if( typeof upFn === 'function') upFn();
                }
                if( ev.preventDefault ) ev.preventDefault();
                return false;
            }
        }
    }
_diysrcoll()

