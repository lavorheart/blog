var page = function (parameters) {
    this.init(parameters);
};
page.prototype = {
    init: function (parameters) {
        this.page = 1;
        this.pagesize = parameters.pagesize;
        this.count = parameters.count;
        this.listMax = 10;
        this.first = "";
        this.end = '';
        this.number = "<a href='javascript:void(0);' class='w-num'>number</a>";
        this.current = "<span href='javascript:void(0);' class='w-cur'>number</span>";
        this.prev = "<a href='javascript:void(0);' class='w-num w-pre'>&lt;</a>";
        this.next = "<a href='javascript:void(0);' class='w-num w-next'>&gt;</a>";
    },
    callbock: function (functionName) {

        var _this = this;
        $('.mod-page a').click(function () {
            if (functionName.count) {
                _this.count = functionName.count;
            }

            if ($('.cmtloading').css('display') != 'none') {
                return;
            }
            var cuttentIndex = parseInt($('.w-cur').text());
            var clickOne = $(this).attr('class');
            var nextPage = 0;
            if (clickOne == 'w-num w-pre') {
                nextPage = cuttentIndex - 1;
            } else if (clickOne == 'w-num w-next') {
                nextPage = cuttentIndex + 1;
            } else {
                nextPage = parseInt($(this).text());
            }
            if (nextPage <= 0 || nextPage > Math.ceil(_this.count / _this.pagesize) || nextPage == cuttentIndex) {
                return false;
            }
            _this.page = nextPage;
            _this.createHtml();

            functionName.page++;

            functionName.showComment('new', 'commentNewDiv', _this.page);
            _this.callbock(functionName);
        });
    },
    createHtml: function () {
        if (this.count <= 0 || this.count == undefined) {
            return false;
        }
        var countpage = Math.ceil(this.count / this.pagesize);
        if (countpage < 1) {
            return '';
        }
        var pagehtml = '';
        if (countpage <= 10) {
            pagehtml += this.prev;
            for (var i = 1; i <= countpage; i++) {
                if (this.page == i) {
                    pagehtml += this.current.replace('number', i);
                } else {
                    pagehtml += this.number.replace('number', i);
                }
            }
        } else {
            var max = this.listMax - 1;
            var average = Math.ceil(max / 2);
            var addNum = 0;
            for (var i = this.page - 1; i > 0; i--) {
                if (addNum >= average) {
                    break;
                }
                pagehtml = this.number.replace('number', i) + pagehtml;
                addNum++;
                max--;
            }
            pagehtml = this.prev + pagehtml;
            pagehtml += this.current.replace('number', this.page);
            var lastPage = this.page + max > countpage ? countpage : this.page + max;
            for (var i = this.page + 1; i <= lastPage; i++) {
                pagehtml += this.number.replace('number', i);
            }
        }
        pagehtml += this.next;
        $('.mod-page').html(pagehtml);
    }
};
