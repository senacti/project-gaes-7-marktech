package com.example.marktech.controler;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.expression.spel.ast.OpAnd;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.example.marktech.interfaceService.IinventarioService;
import com.example.marktech.modelo.producto;

import jakarta.validation.Valid;

@Controller
@RequestMapping
public class controlador {
	
	@Autowired
	private IinventarioService service;
	
	
	@GetMapping("/listar")
	public String listar(Model model) {
		List<producto>producto=service.listar();
		model.addAttribute("producto", producto);
		return "index";
	}
	@GetMapping("/new")
	public String agregar(Model model) {
		model.addAttribute("producto", new producto());
		return "form";
	}
	@PostMapping("/save")
	public String save (@Valid producto p, Model model ) {
		service.save(p);
		return "redirect:/listar";
		
	}
	@GetMapping ("/editar/{id}")
	public String editar(@PathVariable int id, Model model) {
		Optional<producto>producto= service.listarId(id);
		model.addAttribute("producto", producto);
		return "form";
		
	}
	@GetMapping ("/eliminar/{id}")
	public String delete (Model model, @PathVariable int id) {
		service.delete(id);
		return "redirectd:/listar";
		
	}
}

