using System.Collections.Generic;
using AcademicWebCoreASP.Data.Entities;

namespace AcademicWebCoreASP.Data
{
    public interface IBeerRepo
    {
        bool SaveChanges();

        IEnumerable<Product> GetAllProducts();
        IEnumerable<Product> GetProductsByCategory(string category);

        IEnumerable<Order> GetAllOrders();
        Order GetOrderById(int id);
        void AddEntity(object model);

    }
}