using Microsoft.AspNetCore.Mvc;

namespace rental.Controllers
{
    public class AboutController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }
    }
}
