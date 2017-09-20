module.exports = function(grunt){
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Sass
        sass: {
            dist: {
                files: {
                    'lib/styles/main.min.css' : 'lib/sass/main.scss',
                    'login/login_screen.min.css' : 'lib/sass/loginscreen/login_screen.scss'
                    },
                options: {
                    style: 'compressed' // nested, compact, compressed, expanded
                    }
                },
            },

        // Watch
        watch: {
            sass: {
                files: 'lib/sass/**/*.scss', // Using globbing pattern
                tasks: 'sass'  // task name
                }
            },

        });
    grunt.registerTask('default', 'watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    };
