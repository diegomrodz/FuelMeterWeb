module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            options: {
                separator: '\n\n'
            },
            dist: {
                src: [
                    'public/static/web/app/main.js',
                    'public/static/web/app/factory/**/*.js',
                    'public/static/web/app/**/*.js',
                    'public/static/web/app/**/*.js',
                    'public/static/web/app/**/*.js',
                    'public/static/web/app/**/*.js',
                    'public/static/web/app/config.js'
                ],
                dest: 'public/static/web/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            }
        },

        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: 'public/static/web/dist/<%= pkg.version %>/<%= pkg.name %>.js',
                dest: 'public/static/web/dist/<%= pkg.version %>/<%= pkg.name %>.min.js'
            }
        },

        watch: {
            scripts: {
                files: [
                    'public/static/web/app/main.js',
                    'public/static/web/app/factory/**/*.js',
                    'public/static/web/app/**/*.js',
                    'public/static/web/app/**/*.js',
                    'public/static/web/app/**/*.js',
                    'public/static/web/app/**/*.js',
                    'public/static/web/app/config.js'
                ],
                tasks: ['default']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Default task(s).
    grunt.registerTask('default', ['concat', 'uglify']);

};