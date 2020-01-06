$(function() {
    var hgS3 = new selectSwiper({
        el: '.select_box3',
        mustSelect: true,
        activeIndex: 0,
        data: ['包裹/WPX', '文件/DOC', '防水袋/PAK'],
        init: function(index) {
            if (index !== -1) {
                $('#btn3').val(this.data[index]);
            }
        },
        okFunUndefind: function() {
            alert('必须选择一项');
            return false;
        },
        okFun: function(index) {
            $('#btn3').val(this.data[index]);
        },
        closeFun: function() {
            console.log('取消');
        },
    });
    $('#btn3').on('click',
        function() {
            hgS3.openSelectSwiper();
        });
});