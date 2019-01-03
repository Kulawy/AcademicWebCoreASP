using AcademicWebCoreASP.Data;
using AcademicWebCoreASP.Data.Entities;
using AcademicWebCoreASP.ViewModels;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AcademicWebCoreASP.Controllers
{
    [Route("api/[Controller]")]
    public class OrdersController : Controller
    {
        private readonly IBeerRepo _repo;
        private readonly ILogger<OrdersController> _logger;

        public OrdersController(IBeerRepo repo, ILogger<OrdersController> logger)
        {
            _repo = repo;
            _logger = logger;
        }

        [HttpGet]
        public IActionResult Get()
        {
            try
            {
                return Ok(_repo.GetAllOrders());
            }
            catch (Exception ex)
            {
                _logger.LogError($"Failed to get orders: {ex}");
                return BadRequest("Failed to get orders");
            }
        }

        [HttpGet("{id:int}")]
        public IActionResult Get(int id)
        {
            try
            {
                var order = _repo.GetOrderById(id);
                if ( order != null)
                    return Ok(order);
                else
                {
                    return NotFound();
                }
            }
            catch (Exception ex)
            {
                _logger.LogError($"Failed to get orders: {ex}");
                return BadRequest("Failed to get orders");
            }
        }

        [HttpPost]
        public IActionResult Post([FromBody]OrderViewModel model) //zmieniamy z Order na OrderViewModel żeby walidowaćpo ViewModel
        {
            try
            {

                if (ModelState.IsValid)
                {
                    var newOrder = new Order()
                    {
                        OrderDate = model.OrderDate,
                        OrderNumber = model.OrderNumber,
                        Id = model.OrderId
                    };

                    if (newOrder.OrderDate == DateTime.MinValue)
                    {
                        newOrder.OrderDate = DateTime.Now;
                    }

                    _repo.AddEntity(newOrder); // jak już ViewModel to zamias model chcemy dać newOrder
                    if (_repo.SaveChanges())
                    {
                        var vm = new OrderViewModel()
                        {
                            OrderId = newOrder.Id,
                            OrderDate = newOrder.OrderDate,
                            OrderNumber = newOrder.OrderNumber
                        };

                        return Created($"/api/orders/{vm.OrderId}", model);  // z model.Id na vm.OrderId jak mamy vm po dodaniu ViewModel
                    } 
                }
                else
                {
                    return BadRequest(ModelState);
                }

            }
            catch(Exception ex)
            {
                _logger.LogError($"Failed to save a new order: {ex}");
            }

            return BadRequest("Fail to save new order");
        }

    }
}
