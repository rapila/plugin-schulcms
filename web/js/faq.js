(function(wok, React) {
	'use strict';

	var FAQTagList = React.createClass({
		render: function() {
			return React.createElement(
				'div',
				{},
				this.props.tags.join(', ')
			);
		}
	});

	var FAQ = React.createClass({
		render: function() {
			return React.createElement('div',
				{},
				[
					React.createElement('h3', {key: 'title'}, this.props.faq.Title),
					React.createElement('content', {key: 'content', dangerouslySetInnerHTML: {__html: this.props.faq.Content}}),
					React.createElement(FAQTagList, {key: 'tags', tags: this.props.faq.tags})
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
			var faqs = this.state.faqs.map(function(faq) {
				return React.createElement(
					FAQ,
					{
						faq: faq,
						key: faq.__key
					}
				);
			});
			return React.createElement(
				'div',
				{
					className: 'faq-list'
				},
				faqs
			);
		}
	});

	function faq(element) {
		var list = React.render(
			React.createElement(
				FAQList,
				{}
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