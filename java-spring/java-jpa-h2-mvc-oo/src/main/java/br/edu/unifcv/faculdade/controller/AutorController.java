package br.edu.unifcv.faculdade.controller;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import br.edu.unifcv.faculdade.model.Autor;
import br.edu.unifcv.faculdade.service.AutorService;

@RestController
@RequestMapping(path = "autor/")
public class AutorController {
	@Autowired
	private AutorService autorService;
	
	@RequestMapping(path = "/")
	public List<Autor> findAll() {
		return autorService.getAll();
	}
	
	@RequestMapping(path = "/{id}")
	public Optional<Autor> findById(@PathVariable Long id) {
		return autorService.findById(id);
	}
	
	@RequestMapping(path = "/save", method = RequestMethod.POST)
	public Autor save(@RequestBody Autor autor) {
		return autorService.saveOrUpdate(autor);
	}
	
	@RequestMapping(path = "/delete", method = RequestMethod.DELETE)
	public void delete(@RequestBody Autor autor) {
		autorService.delete(autor);
	}
	
	@RequestMapping(path = "/delete/{id}", method = RequestMethod.DELETE)
	public void deleteById(@PathVariable Long id) {
		autorService.deleteById(id);
	}
}
