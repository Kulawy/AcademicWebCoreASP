using AcademicWebCoreASP.Data;
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
        private readonly IBeerRepo _repo;
        //private readonly BeerDataContext _context;

        public AppController(IMailService mailService, IBeerRepo repo) //jeśli mamy IBeerRepo to zastępujemy BeerDataContext właśnie IBeerRepo
        {
            _mailService = mailService;
            _repo = repo;
            //_context = context;
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

        [HttpGet("shop")]
        public IActionResult Shop()
        {
            ViewBag.Title = "Shop";
            ViewBag.Baner = "banner.png";

            //var result = _context.Products
            //    .OrderBy(p => p.BeerName)
            //    .ToList();

            var result = _repo.GetAllProducts();
            
            return View(result);
        }

        [HttpGet("game")]
        public IActionResult Game()
        {

            return View();
        }

    }
}
