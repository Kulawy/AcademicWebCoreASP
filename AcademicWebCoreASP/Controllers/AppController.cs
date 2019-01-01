using AcademicWebCoreASP.Services;
using AcademicWebCoreASP.ViewModels;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AcademicWebCoreASP.Controllers
{
    public class AppController : Controller
    {
        private readonly IMailService _mailService;

        public AppController(IMailService mailService)
        {
            _mailService = mailService;
        }

        [HttpGet("index")]
        public IActionResult Index()
        {
            
            return View();
        }

        [HttpGet("contact")]
        public IActionResult Contact()
        {

            return View();
        }

        [HttpPost("contact")] //Model binding żeby pobrać dane z model
        public IActionResult Contact(ContactViewModel model)
        {
            if (ModelState.IsValid)
            {
                _mailService.SendMessage("some.mail@gmail.com", $"Message from user: {model.Fname} {model.Lname}", $"From: {model.Email}, Message: {model.Message}");
                ViewBag.UserMessage = "Mail Sent";
                ModelState.Clear();
            }



            return View();



        }

        [HttpGet("about")]
        public IActionResult About()
        {
            ViewBag.Title = "About";
            ViewBag.Baner = "banner.png";

            return View();
        }


    }
}
