module.exports = function(grunt){

    //Configuration
    grunt.initConfig({
        sass: {
            dev: {
                options: {
                    style: 'expanded',
                    quiet: true
                },
                files: {
                    'style.css': 'sass/main.scss'
                }
            }
        },
        watch: {
            files: ['**/*.scss'],
            tasks: ['sass:dev']
        }
    });

    //Load grunt-sass
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch'); //provide watch command: 'grunt watch'

    //Task
    grunt.registerTask('default', ['watch']);
}
