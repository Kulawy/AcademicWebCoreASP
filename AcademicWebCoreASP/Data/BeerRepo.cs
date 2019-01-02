using AcademicWebCoreASP.Data.Entities;
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

        public BeerRepo(BeerDataContext ctx)
        {
            _ctx = ctx;
        }

        public IEnumerable<Product> GetAllProducts()
        {

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

        public bool SaveChanges()
        {
            return _ctx.SaveChanges() > 0;
        }
        
    }
}
