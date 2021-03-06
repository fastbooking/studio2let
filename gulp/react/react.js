var source        = require('../config').source
var react         = require('../config').react
var dev           = require('../config').dev
var watchify      = require('watchify')
var browserify    = require('browserify')
var vsource       = require('vinyl-source-stream')
var gutil         = require('gulp-util')
var assign        = require('lodash.assign')
var tpl           = require('../config').tpl
var fs            = require('fs');
var rename        = require('gulp-rename')
var babelify      = require('babelify')

var dev_bundle_js = function( bundler, name, dest ) {
	return bundler.bundle()
		.on('error', gutil.log.bind(gutil, 'Browserify Error'))
		.pipe(vsource(name+'.js'))
		.pipe(rename(name+'-react-bundle.js'))
		.pipe(gulp.dest(dest));
};

var dev_task_react = function( name, src, dest, dir ) {
	gulp.task(name, function(){

		var customOpts = {
			entries: src,
		};
		var opts = assign({}, watchify.args, customOpts);
		var bundler = watchify(browserify(opts));
		bundler.transform(babelify.configure({
			presets: ["es2015"]
		}));
		dev_bundle_js(bundler, dir, dest);

		bundler.on('log', gutil.log); // output build logs to terminal
		bundler.on('update', function () {
			dev_bundle_js(bundler, dir, dest)
		})

	});
};

var tpl_srcs = [];
react_set_tpl_src = function() {
	for(var index in tpl) {
		var dir = tpl[index];
		var dir_src = react+dir+'.js';
		if( fs.existsSync(dir_src) ) {
			dev_task_react(
					dir+'-react'
				, [dir_src]
				, dev+dir
				, dir
			);
		}
	}
};
react_set_tpl_src();