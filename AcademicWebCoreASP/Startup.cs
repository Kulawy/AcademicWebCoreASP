using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using AcademicWebCoreASP.Services;
using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.Extensions.DependencyInjection;

namespace AcademicWebCoreASP
{
    public class Startup
    {
        // This method gets called by the runtime. Use this method to add services to the container.
        // For more information on how to configure your application, visit https://go.microsoft.com/fwlink/?LinkID=398940
        public void ConfigureServices(IServiceCollection services)
        {
            services.AddTransient<IMailService, NullMailService>();
            // Support for real mail service

            // DEPENDENCY INJECTION !
            services.AddMvc();
        }

        // This method gets called by the runtime. Use this method to configure the HTTP request pipeline.
        public void Configure(IApplicationBuilder app, IHostingEnvironment env)
        {
            //ZAKOMENTOWANE W MODULE 2 KURSU PLURAL
            //if (env.IsDevelopment())
            //{
            //    app.UseDeveloperExceptionPage();
            //}

            //app.Run(async (context) =>
            //{
            //    await context.Response.WriteAsync("Hello World!");
            //});

            if (env.IsDevelopment()) // jeśli jest na etapie rozwoju to używa Strony do wyjątków dla developerów (wszystko opisane dla programisty)
            {
                app.UseDeveloperExceptionPage();
            }
            else
            {
                app.UseExceptionHandler("/error");
            }
            
            //app.UseDefaultFiles(); kiedy już mmy app.UseMvC() to nie musimy mieć tego bo nie będziemy już działać w ten sposób, że łądujemy statycznie strony domyślne
            app.UseStaticFiles();
            app.UseNodeModules(env);
            
            app.UseMvc( cfg =>
            {
                cfg.MapRoute(
                    "Default",
                    "/{controller}/{action}/{id?}",
                    new { controller = "App", Action = "Index" }
                    );
            });

        }


    }
}
