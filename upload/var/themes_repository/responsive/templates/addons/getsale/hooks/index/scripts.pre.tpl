{script src="js/addons/getsale/func.js"}
<script type="text/javascript">
    //<![CDATA[
    {if $getsale}
    {$getsale nofilter}
    {/if}

    {if isset($getsale_cview)}
    {$getsale_cview nofilter}
    {/if}

    {if isset($getsale_iview)}
    {$getsale_iview nofilter}
    {/if}

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([.$?*|{}()[]\/+^])/g, '\$1') + "=([^;]*)"));
        return matches ? decodeURIComponent(matches[1]) : 'N';
    }

    var getsale_add = getCookie('GETSALE_ADD');
    if(getsale_add && getsale_add == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(getSale) {
                getSale.event('add-to-cart');
                console.log('add-to-cart');
            });
        })(window, 'getSaleCallbacks');
        document.cookie = 'GETSALE_ADD=N; path=/;';
    }

    var getsale_del = getCookie('GETSALE_DELETE');
    if(getsale_del && getsale_del == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(getSale) {
                getSale.event('del-from-cart');
                console.log('del-from-cart');
            });
        })(window, 'getSaleCallbacks');
        document.cookie = 'GETSALE_DELETE=N; path=/;';
    }

    var getsale_iview = getCookie('GETSALE_IVIEW');
    if(getsale_iview && getsale_iview == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(getSale) {
                getSale.event('item-view');
                console.log('item-view');
            });
        })(window, 'getSaleCallbacks');
        document.cookie = 'GETSALE_IVIEW=N; path=/;';
    }

    var getsale_sorder = getCookie('GETSALE_SORDER');
    if(getsale_sorder && getsale_sorder == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(getSale) {
                getSale.event('success-order');
                console.log('success-order');
            });
        })(window, 'getSaleCallbacks');
        document.cookie = 'GETSALE_SORDER=N; path=/;';
    }

    var getsale_reg = getCookie('GETSALE_REG');
    if(getsale_reg && getsale_reg == 'Y') {
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(getSale) {
                getSale.event('user-reg');
                console.log('user-reg');
            });
        })(window, 'getSaleCallbacks');
        document.cookie = 'GETSALE_REG=N; path=/;';
    }
    //]]>
</script>