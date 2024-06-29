using Microsoft.AspNetCore.Mvc;
using rental.Models;

namespace rental.Controllers
{
    public class ListingsController : Controller
    {
        private static readonly List<Equipment> _equipmentList = new List<Equipment>
        {
            new Equipment { Id = 1, Name = "Boom Lift", Price = "$200/day", ImageUrl = "Boom_Lift.jpg" },
            new Equipment { Id = 2, Name = "Scissor Lift", Price = "$150/day", ImageUrl = "Scissor_Lift.jpg" },
            new Equipment { Id = 3, Name = "Forklift", Price = "$120/day", ImageUrl = "Forklift.jpg" },
            new Equipment { Id = 4, Name = "Single Man Lift", Price = "$100/day", ImageUrl = "Single_Man_Lift.jpg" },
            new Equipment { Id = 5, Name = "Telehandler", Price = "$250/day", ImageUrl = "Telehandler.jpg" },
            new Equipment { Id = 6, Name = "Bulldozer", Price = "$300/day", ImageUrl = "Bulldozer.jpg" },
            new Equipment { Id = 7, Name = "Wheel Tractor-Scraper", Price = "$350/day", ImageUrl = "Wheel_Tractor_Scraper.jpg" },
            new Equipment { Id = 8, Name = "Skid Steer Loader", Price = "$130/day", ImageUrl = "Skid_Steer_Loader.jpg" },
            new Equipment { Id = 9, Name = "Backhoe Loader", Price = "$220/day", ImageUrl = "Backhoe_Loader.jpg" },
            new Equipment { Id = 10, Name = "Excavator", Price = "$500/day", ImageUrl = "Excavator.jpg" },
            new Equipment { Id = 11, Name = "Feller Buncher", Price = "$450/day", ImageUrl = "Feller_Buncher.jpg" },
            new Equipment { Id = 12, Name = "Harvester", Price = "$400/day", ImageUrl = "Harvester.jpg" },
            new Equipment { Id = 13, Name = "Trencher", Price = "$320/day", ImageUrl = "Trencher.jpg" },
            new Equipment { Id = 14, Name = "Articulated Hauler", Price = "$280/day", ImageUrl = "Articulated_Hauler.jpg" },
            new Equipment { Id = 15, Name = "Off-Highway Truck", Price = "$420/day", ImageUrl = "Off_Highway_Truck.jpg" },
            new Equipment { Id = 16, Name = "Asphalt Paver", Price = "$350/day", ImageUrl = "Asphalt_Paver.jpg" },
            new Equipment { Id = 17, Name = "Cold Planer", Price = "$300/day", ImageUrl = "Cold_Planer.jpg" },
            new Equipment { Id = 18, Name = "Motor Grader", Price = "$360/day", ImageUrl = "Motor_Grader.jpg" },
            new Equipment { Id = 19, Name = "Compactor", Price = "$250/day", ImageUrl = "Compactor.jpg" },
            new Equipment { Id = 20, Name = "Drum Roller", Price = "$220/day", ImageUrl = "Drum_Roller.jpg" },
            new Equipment { Id = 21, Name = "Compact Track Loader", Price = "$210/day", ImageUrl = "Compact_Track_Loader.jpg" },
            new Equipment { Id = 22, Name = "Skidder", Price = "$310/day", ImageUrl = "Skidder.jpg" },
            new Equipment { Id = 23, Name = "Forwarder", Price = "$270/day", ImageUrl = "Forwarder.jpg" },
            new Equipment { Id = 24, Name = "Knuckleboom Loader", Price = "$290/day", ImageUrl = "Knuckleboom_Loader.jpg" },
            new Equipment { Id = 25, Name = "Towable Light Tower", Price = "$120/day", ImageUrl = "Towable_Light_Tower.jpg" },
            new Equipment { Id = 26, Name = "Carry Deck Crane", Price = "$400/day", ImageUrl = "Carry_Deck_Crane.jpg" },
            new Equipment { Id = 27, Name = "Concrete Mixer Truck", Price = "$350/day", ImageUrl = "Concrete_Mixer_Truck.webp" },
            new Equipment { Id = 28, Name = "Drill Rig", Price = "$500/day", ImageUrl = "Drill_Rig.webp" },
            new Equipment { Id = 29, Name = "Dump Truck", Price = "$320/day", ImageUrl = "Dump_Truck.webp" },
            new Equipment { Id = 30, Name = "Utility Vehicle", Price = "$150/day", ImageUrl = "Utility_Vehicle.webp" },
            new Equipment { Id = 31, Name = "Truck-Mounted Crane", Price = "$420/day", ImageUrl = "Truck_Mounted_Crane.webp" },
            new Equipment { Id = 32, Name = "Walkie Stacker", Price = "$100/day", ImageUrl = "Walkie_Stacker.webp" },
            new Equipment { Id = 33, Name = "Tunnel Boring Machine", Price = "$600/day", ImageUrl = "Tunnel_Boring_Machine.webp" },
            new Equipment { Id = 34, Name = "Rock Breaker", Price = "$200/day", ImageUrl = "Rock_Breaker.webp" },
            new Equipment { Id = 35, Name = "Concrete Pump", Price = "$250/day", ImageUrl = "Concrete_Pump.webp" },
            new Equipment { Id = 36, Name = "Pipe Layer", Price = "$340/day", ImageUrl = "Pipe_Layer.webp" },
            new Equipment { Id = 37, Name = "Dragline Excavator", Price = "$500/day", ImageUrl = "Dragline_Excavator.webp" }
        };

        [HttpGet]
        public IActionResult Index()
        {
            return View(_equipmentList);
        }
    }
}
