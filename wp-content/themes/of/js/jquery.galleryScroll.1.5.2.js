/*
 * jQuery galleryScroll v1.5.2
 */

/*
	************* OPTIONS ************************************** default ****************
	btPrev         - link for previos [selector]    	btPrev: 'a.btn-pre'
	btNext         - link for next [selector]		btNext: 'a.btn-next'
	holderList     - image list holder [Tag name]		holderList: 'div'
	scrollElParent - list [Tag name]			scrollElParent: 'ul'
	scrollEl       - list element [Tag name]		scrollEl: 'li'
	slideNum       - view slide numbers [boolean]		slideNum: false
	duration       - duration slide [1000 - 1sec]		duration : 1000
	step           - slide step [int]			step: false
	circleSlide    - slide circle [boolean]			circleSlide: true
	disableClass   - class for disable link	[string] 	disableClass: 'disable'
	funcOnclick    - callback function			funcOnclick: null
	innerMargin    - inner margin, use width step [px]      innerMargin:0
	autoSlide      - auto slide [1000 - 1sec]               autoSlide:false
	*************************************************************************************
*/
jQuery.fn.galleryScrollVer = function(_options){
	// defaults options	
	var _options = jQuery.extend({
		btPrev: 'a.link-prev',
		btNext: 'a.link-next',
		holderList: 'div',
		scrollElParent: 'ul',
		scrollEl: 'li',
		slideNum: false,
		duration : 0,
		step: false,
		circleSlide: true,
		disableClass: 'disable',
		funcOnclick: null,
		autoSlide:false,
		innerMargin:0,
		stepHeight:false
	},_options);

	return this.each(function(){
		var _this = jQuery(this);

		var _holderBlock = jQuery(_options.holderList,_this);
		var _gHeight = _holderBlock.height();
		var _animatedBlock = jQuery(_options.scrollElParent,_holderBlock);
		var _liHeight = jQuery(_options.scrollEl,_animatedBlock).outerHeight(true);
		var _liSum = jQuery(_options.scrollEl,_animatedBlock).length * _liHeight;
		var _margin = -_options.innerMargin;
		var f = 0;
		var _step = 0;
		var _autoSlide = _options.autoSlide;
		var _timerSlide = null;
		if (!_options.step) _step = _gHeight; else _step = _options.step*_liHeight;
		if (_options.stepHeight) _step = _options.stepHeight;
		
		if (!_options.circleSlide) {
			if (_options.innerMargin == _margin)
				jQuery(_options.btPrev,_this).addClass('prev-'+_options.disableClass);
		}
		if (_options.slideNum && !_options.step) {
			var _lastSection = 0;
			var _sectionHeight = 0;
			while(_sectionHeight < _liSum)
			{
				_sectionHeight = _sectionHeight + _gHeight;
				if(_sectionHeight > _liSum) {
				       _lastSection = _sectionHeight - _liSum;
				}
			}
		}
		if (_autoSlide) {
				_timerSlide = setTimeout(function(){
					autoSlide(_autoSlide);
				}, _autoSlide);
			_animatedBlock.hover(function(){
				clearTimeout(_timerSlide);
			}, function(){
				_timerSlide = setTimeout(function(){
					autoSlide(_autoSlide)
				}, _autoSlide);
			});
		}
	
		// click button 'Next'
		jQuery(_options.btNext,_this).bind('click',function(){
			jQuery(_options.btPrev,_this).removeClass('prev-'+_options.disableClass);
			if (!_options.circleSlide) {
				if (_margin + _step  > _liSum - _gHeight - _options.innerMargin) {
					if (_margin != _liSum - _gHeight - _options.innerMargin) {
						_margin = _liSum - _gHeight  + _options.innerMargin;
						jQuery(_options.btNext,_this).addClass('next-'+_options.disableClass);
						_f2 = 0;
					} 
				} else {
					_margin = _margin + _step;
					if (_margin == _liSum - _gHeight - _options.innerMargin) {
						jQuery(_options.btNext,_this).addClass('next-'+_options.disableClass);_f2 = 0;
					} 					
				}
			} else {
				if (_margin + _step  > _liSum - _gHeight + _options.innerMargin) {
					if (_margin != _liSum - _gHeight + _options.innerMargin) {
						_margin = _liSum - _gHeight  + _options.innerMargin;
					} else {
						_f2 = 1;
						_margin = -_options.innerMargin;
					}
				} else {
					_margin = _margin + _step;
					_f2 = 0;
				}
			} 
			
			_animatedBlock.animate({marginTop: -_margin+"px"}, {queue:false,duration: _options.duration });
			
			if (_timerSlide) {
				clearTimeout(_timerSlide);
				_timerSlide = setTimeout(function(){
					autoSlide(_options.autoSlide)
				}, _options.autoSlide);
			}
			
			if (_options.slideNum && !_options.step) jQuery.fn.galleryScrollVer.numListActive(_margin,jQuery(_options.slideNum, _this),_gHeight,_lastSection);		
			if (jQuery.isFunction(_options.funcOnclick)) {
				_options.funcOnclick.apply(_this);
			}
			return false;
		});
		// click button 'Prev'
		var _f2 = 1;
		jQuery(_options.btPrev, _this).bind('click',function(){
			jQuery(_options.btNext,_this).removeClass('next-'+_options.disableClass);
			if (_margin - _step >= -_step - _options.innerMargin && _margin - _step <= -_options.innerMargin) {
				if (_f2 != 1) {
					_margin = -_options.innerMargin;
					_f2 = 1;
				} else {
					if (_options.circleSlide) {
						_margin = _liSum - _gHeight  + _options.innerMargin;
						f=1;_f2=0;
					} else {
						_margin = -_options.innerMargin
					}
				}
			} else if (_margin - _step < -_step + _options.innerMargin) {
				_margin = _margin - _step;
				f=0;
			}
			else {_margin = _margin - _step;f=0;};
			
			if (!_options.circleSlide && _margin == _options.innerMargin) {
				jQuery(this).addClass('prev-'+_options.disableClass);
				_f2=0;
			}
			
			if (!_options.circleSlide && _margin == -_options.innerMargin) jQuery(this).addClass('prev-'+_options.disableClass);
			_animatedBlock.animate({marginTop: -_margin + "px"}, {queue:false, duration: _options.duration});
			
			if (_options.slideNum && !_options.step) jQuery.fn.galleryScrollVer.numListActive(_margin,jQuery(_options.slideNum, _this),_gHeight,_lastSection);
			
			if (_timerSlide) {
				clearTimeout(_timerSlide);
				_timerSlide = setTimeout(function(){
					autoSlide(_options.autoSlide)
				}, _options.autoSlide);
			}
			
			if (jQuery.isFunction(_options.funcOnclick)) {
				_options.funcOnclick.apply(_this);
			}
			return false;
		});
		
		if (_liSum <= _gHeight) {
			jQuery(_options.btPrev,_this).addClass('prev-'+_options.disableClass).unbind('click');
			jQuery(_options.btNext,_this).addClass('next-'+_options.disableClass).unbind('click');
		}
		// auto slide
		function autoSlide(autoSlideDuration){
			//if (_options.circleSlide) {
				jQuery(_options.btNext,_this).trigger('click');
			//}
		};
		// Number list
		jQuery.fn.galleryScrollVer.numListCreate = function(_elNumList, _liSumHeight, _height, _section){
			var _numListElC = '';
			var _num = 1;
			var _difference = _liSumHeight + _section;
			while(_difference > 0)
			{
				_numListElC += '<li><a href="">'+_num+'</a></li>';
				_num++;
				_difference = _difference - _height;
			}
			jQuery(_elNumList).html('<ul>'+_numListElC+'</ul>');
		};
		jQuery.fn.galleryScrollVer.numListActive = function(_marginEl, _slideNum, _height, _section){
			if (_slideNum) {
				jQuery('a',_slideNum).removeClass('active');
				var _activeRange = _height - _section-1;
				var _n = 0;
				if (_marginEl != 0) {
					while (_marginEl > _activeRange) {
						_activeRange = (_n * _height) -_section-1 + _options.innerMargin;
						_n++;
					}
				}
				var _a  = (_activeRange+_section+1 + _options.innerMargin)/_height - 1;
				jQuery('a',_slideNum).eq(_a).addClass('active');
			}
		};
		if (_options.slideNum && !_options.step) {
			jQuery.fn.galleryScrollVer.numListCreate(jQuery(_options.slideNum, _this), _liSum, _gHeight,_lastSection);
			jQuery.fn.galleryScrollVer.numListActive(_margin, jQuery(_options.slideNum, _this),_gHeight,_lastSection);
			numClick();
		};
		function numClick() {
			jQuery(_options.slideNum, _this).find('a').click(function(){
				jQuery(_options.btPrev,_this).removeClass('prev-'+_options.disableClass);
				jQuery(_options.btNext,_this).removeClass('next-'+_options.disableClass);
				
				var _indexNum = jQuery(_options.slideNum, _this).find('a').index(jQuery(this));
				_margin = (_step*_indexNum) - _options.innerMargin;
				f=0; _f2=0;
				if (_indexNum == 0) _f2=1;
				if (_margin + _step > _liSum) {
					_margin = _margin - (_margin - _liSum) - _step + _options.innerMargin;
					if (!_options.circleSlide) jQuery(_options.btNext, _this).addClass('next-'+_options.disableClass);
				}
				_animatedBlock.animate({margintop: -_margin + "px"}, {queue:false, duration: _options.duration});
				
				if (!_options.circleSlide && _margin==0) jQuery(_options.btPrev,_this).addClass('prev-'+_options.disableClass);
				jQuery.fn.galleryScrollVer.numListActive(_margin, jQuery(_options.slideNum, _this),_gHeight,_lastSection);
				
				if (_timerSlide) {
					clearTimeout(_timerSlide);
					_timerSlide = setTimeout(function(){
						autoSlide(_options.autoSlide)
					}, _options.autoSlide);
				}
				return false;
			});
		};
		jQuery(window).resize(function(){
			_gHeight = _holderBlock.height();
			_liHeight = jQuery(_options.scrollEl,_animatedBlock).outerHeight(true);
			_liSum = jQuery(_options.scrollEl,_animatedBlock).length * _liHeight;
			if (!_options.step) _step = _gHeight; else _step = _options.step*_liHeight;
			if (_options.slideNum && !_options.step) {
				var _lastSection = 0;
				var _sectionHeight = 0;
				while(_sectionHeight < _liSum)
				{
					_sectionHeight = _sectionHeight + _gHeight;
					if(_sectionHeight > _liSum) {
					       _lastSection = _sectionHeight - _liSum;
					}
				};
				jQuery.fn.galleryScrollVer.numListCreate(jQuery(_options.slideNum, _this), _liSum, _gHeight,_lastSection);
				jQuery.fn.galleryScrollVer.numListActive(_margin, jQuery(_options.slideNum, _this),_gHeight,_lastSection);
				numClick();
			};
			//if (_margin == _options.innerMargin) jQuery(this).addClass(_options.disableClass);
			if (_liSum - _gHeight  < _margin - _options.innerMargin) {
				if (!_options.circleSlide) jQuery(_options.btNext, _this).addClass('next-'+_options.disableClass);
				_animatedBlock.animate({marginTop: -(_liSum - _gHeight + _options.innerMargin)}, {queue:false, duration: _options.duration});
			};
		});
	});
}

