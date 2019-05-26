package br.edu.unifcv.faculdade.controller;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import br.edu.unifcv.faculdade.model.Livro;
import br.edu.unifcv.faculdade.service.LivroService;

@RestController
@RequestMapping(path = "livro/")
public class LivroController {
	@Autowired
	private LivroService livroService;
	
	@RequestMapping(path = "/")
	public List<Livro> findAll() {
		return livroService.getAll();
	}
	
	@RequestMapping(path = "/{id}")
	public Optional<Livro> findById(@PathVariable Long id) {
		return livroService.findById(id);
	}
	
	@RequestMapping(path = "/save", method = RequestMethod.POST)
	public Livro save(@RequestBody Livro livro) {
		return livroService.saveOrUpdate(livro);
	}
	
	@RequestMapping(path = "/delete", method = RequestMethod.DELETE)
	public void delete(@RequestBody Livro livro) {
		livroService.delete(livro);
	}
	
	@RequestMapping(path = "/delete/{id}", method = RequestMethod.DELETE)
	public void deleteById(@PathVariable Long id) {
		livroService.deleteById(id);
	}
}
