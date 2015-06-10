(function(wok, React) {
	'use strict';

	var FAQTagList = React.createClass({
		render: function() {
			var _this = this;
			var tags = this.props.tags.map(function(tag) {
				return React.createElement(
					'span',
					{
						className: 'tag',
						key: tag,
						onClick: _this.props.focusTag.bind(null, tag)
					},
					tag
				)
			});
			return React.createElement(
				'div',
				{
					className: 'tags'
				},
				tags
			);
		}
	});

	var FAQ = React.createClass({
		render: function() {
			return React.createElement('div',
				{},
				[
					React.createElement('h3', {key: 'title'}, this.props.faq.Title),
					React.createElement('p', {key: 'content'},
						[
							React.createElement('a',
								{
									href: this.props.faq.link,
									className: 'text-link'
								},
								[
								React.createElement('span', {key: 'description'}, this.props.faq.Content),
								React.createElement('span', {key: 'read-more', className: 'read-more'}, this.props.readMoreText)
								]
							)
						]
					),
					React.createElement('div', {key: 'local_overwrite_sites', className: 'overwrites'}, this.props.faq.local_overwrite_sites),
					React.createElement(FAQTagList, {key: 'tags', tags: this.props.faq.tags, focusTag: this.props.focusTag})
				]
			);
		}
	});

	var FAQList = React.createClass({
		getInitialState: function() {
			return {
				faqs: []
			};
		},
		render: function() {
			var _this = this;
			var faqs = this.state.faqs.map(function(faq) {
				return React.createElement(
					FAQ,
					{
						faq: faq,
						key: faq.__key,
						focusTag: _this.props.focusTag,
						focusType: _this.props.focusType,
						readMoreText: _this.props.readMoreText
					}
				);
			});
			return React.createElement(
				'div',
				{
					className: 'faq list'
				},
				faqs
			);
		}
	});

	function faq(element) {
		var _this = this;
		var list = React.render(
			React.createElement(
				FAQList,
				{
					focusTag: function(tag) {
						_this.request({
							tags: tag
						});
					},
					focusType: function(type) {
						_this.request({
							type: type
						});
					},
					readMoreText: element.getAttribute('data-read-more-text')
				}
			),
			element
		);

		function faqSort(faq1, faq2) {
			return faq1.Title == faq2.Title ? 0 : faq1.Title > faq2.Title ? 1 : -1;
		}

		function render(data, configuration) {
			var faqs = [];
			for(var id in data) {
				faqs.push(data[id]);
			}
			faqs.sort(faqSort);

			list.setState({
				faqs: faqs
			});
		}

		return {
			render: render,
			request: true
		};
	}

	wok.use('faq', faq);
})(window.wok, window.React);