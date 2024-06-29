using Microsoft.AspNetCore.Mvc;
using rental.Models;

namespace rental.Controllers
{
    public class ServicesController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }
    }
}
