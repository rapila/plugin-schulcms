(function(wok, React) {
	'use strict';

	var LOCATION = React.createClass({
		render: function() {
			return React.createElement('div',
				{},
				[
					React.createElement('h3',
						{key: 'title'},
						React.createElement('a', {href: this.props.location.link}, this.props.location.Title)
					),
					React.createElement('div', {key: 'content', dangerouslySetInnerHTML: {__html: this.props.location.Content}}),
				]
			);
		}
	});

	var LOCATIONList = React.createClass({
		getInitialState: function() {
			return {
				locations: []
			};
		},
		render: function() {
			var _this = this;
			var locations = this.state.locations.map(function(location) {
				return React.createElement(
					LOCATION,
					{
						location: location,
						key: location.__key
						focusType: _this.props.focusType
					}
				);
			});
			return React.createElement(
				'div',
				{
					className: 'location-list'
				},
				locations
			);
		}
	});

	function location(element) {
		var _this = this;
		var list = React.render(
			React.createElement(
				LOCATIONList,
				{
					focusType: function(type) {
						_this.request({
							type: type
						});
					}
				}
			),
			element
		);

		function locationSort(location1, location2) {
			return location1.Title == location2.Title ? 0 : location1.Title > location2.Title ? 1 : -1;
		}

		function render(data, configuration) {
			var locations = [];
			for(var id in data) {
				locations.push(data[id]);
			}
			locations.sort(locationSort);

			list.setState({
				locations: locations
			});
		}

		return {
			render: render,
			request: true
		};
	}

	wok.use('location', location);
})(window.wok, window.React);