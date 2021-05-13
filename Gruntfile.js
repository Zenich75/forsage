module.exports = function (grunt) {
    grunt.util.linefeed = "\n";

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
            options: {
                strictMath: true,
                sourceMap: false,
                outputSourceFiles: true
            },
            main: {
                files: [
                    {
                        src: ['assets/less/app.less'],
                        dest: 'styles/main.css'
                    }
                ]
            }
        },
        cssmin: {
            main: {
                files: [{
                    src: 'styles/main.css',
                    dest: 'styles/style.min.css'
                }]
            }
        },
        clean: {
            css: {
                files: [{
                    src: ['styles/main.css']
                }]
            },
            js: {
                files: [{
                    src: ['js/all.js']
                }]
            }
        },
        watch: {
            lessGlobal: {
                files: ['assets/less/**'],
                tasks: ['prepareCss']
            },
            js: {
                files: [
                    'assets/js/index.js'
                ],
                tasks: ['prepareJs']
            }
        },
        concat: {
            css: {
                files: [
                    {
                        src: ['styles/main.css'],
                        dest: 'styles/main.css'
                    }
                ]
            },
            js: {
                files: [
                    {
                        src: [
                            'assets/js/index.js'
                        ],
                        dest: 'js/all.js'
                    }
                ]
            }
        },
        uglify: {
            js:{
                files: [{
                    src: 'js/all.js',
                    dest: 'js/all.min.js'
                }]
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('prepareCss', ['less', 'concat:css', 'cssmin', 'clean:css']);
    grunt.registerTask('prepareJs', ['concat:js', 'uglify', 'clean:js']);
};