using System.ComponentModel.DataAnnotations;

namespace rental.Models
{
    public class RentViewModel
    {
        public int EquipmentId { get; set; }
        public string Name { get; set; }
        public string Email { get; set; }
        public string Phone { get; set; }
        public DateTime StartDate { get; set; }
        public DateTime EndDate { get; set; }
        public string ImageUrl { get; set; } // Add ImageUrl property
        public string Price { get; set; }    // Add Price property
    }
}
