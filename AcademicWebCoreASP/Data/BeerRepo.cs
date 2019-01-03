using AcademicWebCoreASP.Data.Entities;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Logging;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AcademicWebCoreASP.Data
{
    public class BeerRepo : IBeerRepo
    {
        private readonly BeerDataContext _ctx;
        private readonly ILogger<BeerRepo> _logger;

        public BeerRepo(BeerDataContext ctx, ILogger<BeerRepo> logger)
        {
            _ctx = ctx;
            _logger = logger;
        }

        public IEnumerable<Order> GetAllOrders()
        {
            return _ctx.Orders
                .Include( o => o.Items)
                .ThenInclude( i => i.Product)
                .OrderBy(o => o.OrderDate)
                .ToList();
        }

        public Order GetOrderById(int id)
        {
            return _ctx.Orders
                    .Include(o => o.Items)
                    .ThenInclude(i => i.Product)
                    .OrderBy(o => o.OrderDate)
                    .Where(o => o.Id == id)
                    .FirstOrDefault();
        }

        public IEnumerable<Product> GetAllProducts()
        {
            _logger.LogInformation("GetAllProducts CALL from class BeerRepo");

            return _ctx.Products
                .OrderBy(p => p.BeerName)
                .ToList();
        }

        public IEnumerable<Product> GetProductsByCategory(string category)
        {
            return _ctx.Products
                .Where(p => p.BeerCategory == category)
                .ToList();
              
        }

        public void AddEntity(object model)
        {
            _logger.LogInformation("AddEntity CALL from class BeerRepo");
            _ctx.Add(model);
        }

        public bool SaveChanges()
        {
            return _ctx.SaveChanges() > 0;
        }

        


        
    }
}
