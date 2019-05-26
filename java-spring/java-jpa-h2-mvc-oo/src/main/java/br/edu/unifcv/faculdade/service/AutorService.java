package br.edu.unifcv.faculdade.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.edu.unifcv.faculdade.model.Autor;
import br.edu.unifcv.faculdade.repository.AutorRepository;
import br.edu.unifcv.faculdade.service.exception.RecursoNaoEncontradoException;
import br.edu.unifcv.faculdade.service.exception.RegraDeNegocioException;

@Service
public class AutorService implements CrudService<Autor, Long> {

	@Autowired
	private AutorRepository autorRepository;
	
	@Override
	public List<Autor> getAll() {
		return autorRepository.findAll();
	}

	@Override
	public Optional<Autor> findById(Long id) {
		Optional<Autor> autor = autorRepository.findById(id);
		if (autor.isPresent()) {
			return autor;			
		}
		throw new RecursoNaoEncontradoException("Autor com id: " + id.toString() + " não encontrado.");
	}

	@Override
	public Autor saveOrUpdate(Autor object) {
		if (object.getNacionalidade() == null) {
			throw new RegraDeNegocioException("Preencha a nacionalidade.");
		}
		if (object.getNascimento() == null) {
			throw new RegraDeNegocioException("Preencha o nascimento.");
		}
		if (object.getNome() == null) {
			throw new RegraDeNegocioException("Preencha o nome.");
		}
		
		return autorRepository.save(object);
	}

	@Override
	public void delete(Autor object) {
		autorRepository.delete(object);
	}

	@Override
	public void deleteById(Long id) {
		autorRepository.deleteById(id);
	}

}
