using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AcademicWebCoreASP.Data.Entities
{
    public class Product
    {
        public int Id { get; set; }
        public string BeerName { get; set; }
        public string BeerCategory { get; set; }
        public string Description { get; set; }
        public string Producer { get; set; }
        public DateTime AddTime { get; set; }
        public decimal Price { get; set; }
        public string PhotoId { get; set; }
        

    }
}
