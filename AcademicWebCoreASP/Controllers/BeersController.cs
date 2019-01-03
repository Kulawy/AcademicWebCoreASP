using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using AcademicWebCoreASP.Data;
using AcademicWebCoreASP.Data.Entities;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;

namespace AcademicWebCoreASP.Controllers
{
    [Route("api/[Controller]")]
    [ApiController]
    [Produces("application/json")]
    public class BeersController : ControllerBase
    {
        private readonly IBeerRepo _repo;
        private readonly ILogger<BeersController> _logger;

        public BeersController(IBeerRepo repo, ILogger<BeersController> logger)
        {
            _repo = repo;
            _logger = logger;
        }

        [HttpGet]
        [ProducesResponseType(200)]
        [ProducesResponseType(400)]
        public ActionResult<IEnumerable<Product>> Get() // zamiast zwracania IEnumerable<Product>, zwracamy JsonResult, później ActionResult<IEnumerable<Product>> ale to tak dla najlepszej dokumentacji
        {
            try
            {

                return Ok(_repo.GetAllProducts()); //return _repo.GetAllProducts(); lub  return Json(_repo.GetAllProducts());
            }
            catch(Exception ex)
            {
                _logger.LogError($"Failed to get beers:{ex}");
                return BadRequest("Filed to get beers"); //return null lub Json("Bad request ")
            }
        }
    }

}