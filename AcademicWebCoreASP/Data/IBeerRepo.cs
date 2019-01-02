using System.Collections.Generic;
using AcademicWebCoreASP.Data.Entities;

namespace AcademicWebCoreASP.Data
{
    public interface IBeerRepo
    {
        IEnumerable<Product> GetAllProducts();
        IEnumerable<Product> GetProductsByCategory(string category);
        bool SaveChanges();
    }
}